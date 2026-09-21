param(
    [string]$RepoRoot = $PSScriptRoot
)

$ErrorActionPreference = 'Stop'

function Get-ResumePdfPath {
    param(
        [string]$SubmodulePath
    )

    $resumeFiles = git -C $SubmodulePath ls-tree -r --name-only HEAD
    if ($resumeFiles -match '^Resume\.pdf$') {
        return '/Resume.pdf'
    }

    if ($resumeFiles -match '^2023_Resume\.pdf$') {
        return '/2023_Resume.pdf'
    }

    throw "Could not find a resume PDF in $SubmodulePath."
}

function Get-ResumeSymlinkTarget {
    param(
        [string]$SubmodulePath
    )

    $entry = git -C $SubmodulePath ls-tree -l HEAD -- Resume.pdf
    if ($entry -match '^120000\s+blob\s+\S+\s+\S+\s+Resume\.pdf$') {
        $target = git -C $SubmodulePath show HEAD:Resume.pdf
        return $target.Trim()
    }

    return $null
}

Push-Location $RepoRoot
try {
    git submodule update --init --recursive

    $resumeSubmodule = Join-Path $RepoRoot 'resume-cv'
    if (-not (Test-Path $resumeSubmodule)) {
        throw "Expected resume submodule at $resumeSubmodule"
    }

    $resumePdf = Get-ResumePdfPath -SubmodulePath $resumeSubmodule
    $paths = @($resumePdf)
    $resumeTarget = Get-ResumeSymlinkTarget -SubmodulePath $resumeSubmodule
    if ($resumeTarget) {
        $paths += "/$resumeTarget"
    }

    git -C $resumeSubmodule sparse-checkout init --no-cone | Out-Null
    git -C $resumeSubmodule sparse-checkout set --no-cone @paths | Out-Null

    Write-Host "Initialized submodules and sparse-checked resume-cv to $($paths -join ', ')"
}
finally {
    Pop-Location
}
