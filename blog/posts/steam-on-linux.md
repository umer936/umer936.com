# Steam and Proton Gaming on Fedora 43 with NVIDIA

Switching from Windows to Fedora 43, I had trouble running Steam and Proton games. Here’s how I fixed white screens and laggy Big Picture mode.

---

## 1. Use a Separate Games Account (Optional)

Create a dedicated games account to keep your main account on Wayland and optimize Steam for X11 and NVIDIA.

---

## 2. Force Steam to Use X11 and NVIDIA

Steam on Wayland gave white screens and laggy GUIs. Edit the Steam desktop launcher to use X11 and NVIDIA:

```ini
Exec=env GDK_BACKEND=x11 __GLX_VENDOR_LIBRARY_NAME=nvidia steam %U
```

Copy and edit the desktop file:

```bash
cp /usr/share/applications/steam.desktop ~/.local/share/applications/
```

Or use a launcher script:

```bash
#!/bin/bash
export GDK_BACKEND=x11
export __GLX_VENDOR_LIBRARY_NAME=nvidia
steam
```

---

## 3. Enable GPU-Accelerated Web Views

Big Picture mode on my TV was sluggish until I enabled:

**Steam → Settings → Interface → Enable GPU-accelerated rendering in web views**

* Offloads Steam’s UI rendering to the GPU
* Big Picture mode became smooth and responsive

Turn on GPU-accelerated rendering in:

**Steam → Settings → Interface → Enable GPU-accelerated rendering in web views**.

This fixes laggy Big Picture mode.

---

## 4. Gameplay

* Proton and Vulkan games now run at full speed
* First-time Vulkan shader compilation happens normally; subsequent launches are fast

---

## 5. Results

* **Steam and Big Picture** → responsive and smooth
* **Games** → full-speed, no white screens
* Wayland is still used on main accounts for daily work

This setup keeps Fedora 43 fully functional for gaming while preserving a smooth Linux workflow.
