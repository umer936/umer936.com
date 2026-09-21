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

Push-Location $RepoRoot
try {
    git submodule update --init --recursive

    $resumeSubmodule = Join-Path $RepoRoot 'resume-cv'
    if (-not (Test-Path $resumeSubmodule)) {
        throw "Expected resume submodule at $resumeSubmodule"
    }

    $resumePdf = Get-ResumePdfPath -SubmodulePath $resumeSubmodule
    git -C $resumeSubmodule sparse-checkout init --no-cone | Out-Null
    git -C $resumeSubmodule sparse-checkout set --no-cone $resumePdf | Out-Null

    Write-Host "Initialized submodules and sparse-checked resume-cv to $resumePdf"
}
finally {
    Pop-Location
}
