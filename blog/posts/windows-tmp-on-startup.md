## Making `C:\tmp` Behave Like Linux `/tmp` on Windows

One Linux feature I really like is having a `/tmp` folder where I can throw temporary files and let them get cleared automatically later. To get something similar on Windows, I use a `C:\tmp` folder and clear it on startup.

### `ClearTmp.ps1`

```powershell
$TempPath = "C:\tmp"
if (Test-Path $TempPath) { Remove-Item "$TempPath\*" -Recurse -Force -ErrorAction SilentlyContinue }
```

Script is available [here](https://gist.github.com/umer936/ccd38956fa98c8566be1583f53d99c3a).

### Run on startup (Startup folder)

For most personal setups, this is enough.

1. Create `C:\tmp`.
2. Save the script as `C:\scripts\ClearTmp.ps1` (or use the one linked above).
3. Press `Win + R`, type `shell:startup`, and press Enter.
4. In that folder, right-click -> `New` -> `Shortcut`.
5. For **Type the location of the item**, paste:

```powershell
powershell.exe -NoProfile -ExecutionPolicy Bypass -File "C:\scripts\ClearTmp.ps1"
```

6. Name it something like `Clear tmp on startup` and finish.
7. Restart (or sign out/in) and verify `C:\tmp` gets cleared.

### Another way: Task Scheduler

If you want more control over startup behavior, this is another good option.

1. Create `C:\tmp`.
2. Save the script as `C:\scripts\ClearTmp.ps1` (or use the one linked above).
3. Open **Task Scheduler** -> **Create Task**.
4. **Trigger**: `At startup`.
5. **Action**: `Start a program`.
   - Program/script: `powershell.exe`
   - Add arguments:

```powershell
-NoProfile -ExecutionPolicy Bypass -File "C:\scripts\ClearTmp.ps1"
```


That gives me a simple scratch directory on Windows that behaves a lot more like Linux `/tmp`.
