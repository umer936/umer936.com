# Modernizing My ASUS U46E (i7) in 2026

I decided to bring one of my old laptops back to life instead of letting it keep collecting dust.

## Baseline hardware (ASUS U46E i7 model)

From the U46E i7 configurations, the usual baseline specs are:

- Intel Core i7-2670QM (2nd gen)
- 14-inch 1366x768 display
- Intel HM65 platform
- 8 GB DDR3 (varies by unit)
- NVIDIA GeForce GT 540M + Intel HD Graphics 3000
- 2.5-inch SATA drive bay (originally HDD)
- Mini PCIe Wi-Fi card slot

(Some U46E variants shipped with different CPU/RAM/storage combos, but this is the common i7-era setup.)

## Upgrades I made

- Installed a free SSD I got from Micro Center (huge responsiveness upgrade over the original HDD)
- Replaced Wi-Fi with this dual-band Mini PCIe card so I can use my 5 GHz-only network:
  - [WiFi Card Dual Band AC 7265 Mini PCIe](https://www.walmart.com/ip/WiFi-Card-Dual-Band-AC-7265-Mini-PCIe-Network-Adapter-With-4-2-WiFi-Module-Work-With-Laptop-Notebook/3983175120)
- Added this USB-to-HDMI adapter for external display support:
  - [USB 3.0 to HDMI adapter](https://www.walmart.com/ip/USB-to-HDMI-Adapter-HD-1080P-Video-Audio-Converter-USB-3-0-to-HDMI-Adapter-Cable-for-Multiple-Monitors-Support-Windows/2888813061)

## Fedora journey and weird issues

- I could not get Fedora Workstation 43 to install directly.
- I installed Fedora 42 first, then upgraded to 43.
- I eventually moved to Fedora Workstation 44.

The built-in screen has been broken for about 10 years, and I physically disconnected it. I tried disabling the laptop panel in display settings so the external monitor would stay primary, but it would not always stick after reboots. So for now I am back to the sticky note reminder to keep the lid shut.

I also had a power issue that looked serious at first, but it ended up being simple: the barrel connector was not making good contact.

While opening it up to troubleshoot, I stripped out the keyboard assembly and ended up just leaving it out.

At this point, I should probably move the power button outside the frame so I do not have to open it in the first place.

## USB-to-HDMI status on Fedora 44

The adapter I picked up uses the MacroSilicon MS912x chip. This is **not** DisplayLink — it has its own out-of-tree kernel driver. There are two variants of this device:

| Variant             | VID:PID     | Bus   |
|---------------------|-------------|-------|
| MacroSilicon MS912x | `534d:6021` | USB 2 |
| MacroSilicon MS912x | `345f:9132` | USB 3 |

The upstream driver lives at [rhgndf/ms912x](https://github.com/rhgndf/ms912x), but it has not been updated for Linux kernel 6.x/7.x. There are a few threads covering the same problem:

- [AskUbuntu — USB-to-HDMI adapter options that work with Ubuntu/Linux](https://askubuntu.com/questions/1322169/usb-to-hdmi-adapter-that-works-with-ubuntu/1486986#1486986)
- [r/Kalilinux — USB-to-HDMI MacroSilicon 534d:6021 not working](https://www.reddit.com/r/Kalilinux/comments/1pto34o/usbtohdmi_macrosilicon_534d6021_not_working/)
- [Unix StackExchange — Compile and install linux ms912x driver for device 534d:6021](https://unix.stackexchange.com/questions/759400/compile-and-install-linux-ms912x-driver-for-device-534d6021-usb-3-0-to-hdm)
- Various open issues on the upstream GitHub repo

I forked the repo at [umer936/ms912x](https://github.com/umer936/ms912x) and used AI to get it to compile against the newer kernel. The good news: it actually compiles and loads. The bad news: the output is completely unusable right now — the screen flickers on for about 2 seconds, then goes black for several seconds, then comes back for 2 seconds, and just loops like that indefinitely. So the driver works in theory but the timing or synchronization is still broken somewhere.

This is a TODO for later. I'm still able to use the main monitor as normal.

## Why I switched away from Proxmox on this machine

Before Fedora, this laptop was running Proxmox with multiple LXCs. It worked, but for my current setup it felt like overkill.

I moved those container workloads to Docker on my desktop instead, which simplified everything and made this laptop useful again as a lightweight Linux box.
