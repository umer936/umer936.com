## Conversation summary

### Network setup

* You have a **Netgate 2100+ running pfSense Plus**.
* Current pfSense version: **26.07-RELEASE**.
* Your LAN is:

    * pfSense: **192.168.1.1/24**
    * LAN subnet: **192.168.1.0/24**
* Your Cosmos server is:

    * **192.168.1.9**
* Cosmos runs multiple services, including Jellyfin, Immich, Gitea, Home Assistant, Nextcloud, n8n, Mealie, etc.

### DNS / domain setup

You use **`umer936.com`** with pfSense DNS Resolver Host Overrides.

For example:

* `cosmos.umer936.com` → `192.168.1.9`
* `jellyfin.umer936.com` → alias for `cosmos.umer936.com`
* Similar aliases exist for your other Cosmos services.

Cosmos acts as a reverse proxy. Its Jellyfin configuration is:

`http://Jellyfin:8096`

That is an **internal Cosmos/Docker target**, so `192.168.1.9:8096` does not necessarily exist as a LAN-accessible port.

### Tailscale setup

You installed Tailscale on pfSense and your Samsung S25.

pfSense Tailscale:

* Tailscale enabled
* Tailscale version: **1.98.5**
* Tailscale IP: **100.70.93.101**
* Advertised route: **192.168.1.0/24**
* Exit Node: **disabled**
* Subnet route was initially awaiting approval, then you **approved it in the Tailscale admin console**.

Your S25 is also connected to Tailscale:

* Tailscale version: **1.102.3**
* Tailscale IP: **100.126.170.22**

### Testing

You turned **Wi-Fi off on the S25**, leaving it on cellular with Tailscale connected.

Tests:

* `http://192.168.1.9` → **404 Not Found**

    * This demonstrated that the phone could reach Cosmos through the Tailscale subnet route.
* `http://192.168.1.9:8096` → **connection refused**

    * Expected because Jellyfin's `8096` is being used as the Cosmos/Docker reverse-proxy target rather than necessarily being exposed on the Cosmos LAN IP.
* `jellyfin.umer936.com` initially didn't work remotely.

### The problem and solution

The missing piece was **DNS**.

Your pfSense Host Overrides work on your LAN, but the remote Tailscale phone wasn't initially using pfSense's DNS resolver to resolve `umer936.com`.

We configured Tailscale DNS to use:

**192.168.1.1**

for your internal DNS/domain resolution.

You then confirmed:

> **“perfect. works!”**

So the final working path is:

**S25 on cellular → Tailscale → pfSense → 192.168.1.9 Cosmos → Cosmos reverse proxy → Jellyfin**

with:

`jellyfin.umer936.com → pfSense DNS → 192.168.1.9 → Cosmos → Jellyfin`

### Recommended next step

The goal we discussed is to verify the other services through Tailscale, then **disable their public Internet exposure in Cosmos** where appropriate.

That would leave you with:

**Internet → Tailscale → your home network → private services**

rather than exposing all of those services directly to the Internet.

### Important security note

You previously shared some Tailscale/device identifiers and a Tailscale authentication key during setup. We advised treating the **auth key as secret** and not sharing it publicly.
