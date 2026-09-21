param(
    [string]$RepoRoot = $PSScriptRoot
)

$ErrorActionPreference = 'Stop'

function Get-TrackedResumePdfCandidates {
    param(
        [string]$SubmodulePath
    )

    $resumeFiles = git -C $SubmodulePath ls-tree -r --name-only HEAD
    $pdfFiles = @($resumeFiles | Where-Object { $_ -match '\.pdf$' })

    if ($pdfFiles.Count -eq 0) {
        throw "Could not find a resume PDF in $SubmodulePath."
    }

    $rootLevelPdfs = @($pdfFiles | Where-Object { $_ -notmatch '/' })
    if ($rootLevelPdfs.Count -gt 0) {
        $preferredRoot = $rootLevelPdfs | Where-Object { $_ -ieq 'Resume.pdf' } | Select-Object -First 1
        if (-not $preferredRoot) {
            $preferredRoot = $rootLevelPdfs | Select-Object -First 1
        }

        $paths = @("/$preferredRoot")

        $treeEntry = git -C $SubmodulePath ls-tree -l HEAD -- $preferredRoot
        if ($treeEntry -match ('^120000\s+blob\s+\S+\s+\S+\s+' + [regex]::Escape($preferredRoot) + '$')) {
            $symlinkTarget = (git -C $SubmodulePath show "HEAD:$preferredRoot").Trim()
            if ($symlinkTarget) {
                $paths += "/$symlinkTarget"
            }
        }

        return $paths
    }

    $directOutputPdf = @($pdfFiles | Where-Object { $_ -like 'output_pdfs/*' -and $_ -notlike 'output_pdfs/old/*' } | Select-Object -First 1)
    if ($directOutputPdf.Count -gt 0) {
        return @("/$($directOutputPdf[0])")
    }

    return @("/$($pdfFiles | Select-Object -First 1)")
}

Push-Location $RepoRoot
try {
    git submodule update --init --recursive

    $resumeSubmodule = Join-Path $RepoRoot 'resume-cv'
    if (-not (Test-Path $resumeSubmodule)) {
        throw "Expected resume submodule at $resumeSubmodule"
    }

    $paths = Get-TrackedResumePdfCandidates -SubmodulePath $resumeSubmodule

    git -C $resumeSubmodule sparse-checkout init --no-cone | Out-Null
    git -C $resumeSubmodule sparse-checkout set --no-cone @paths | Out-Null

    Write-Host "Initialized submodules and sparse-checked resume-cv to $($paths -join ', ')"
}
finally {
    Pop-Location
}
