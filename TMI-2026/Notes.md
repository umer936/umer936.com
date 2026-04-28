# TMI 2026 Notes (60 min)

## 0:00-2:00 - Title
- Open: "Code is the easy part. Keeping systems healthy while everything moves is the hard part."
- Frame the audience level: this is about practical architecture choices, not perfection.

## 2:00-5:00 - Agenda
- Quick map: who we are, the mental model shift, tools/tradeoffs, examples, Q&A.
- Set expectation: minimal slides, story-first.

## 5:00-9:00 - Who am I?
- 3-person group, around 60 mission-oriented apps, mixed operational/science support workloads.
- Why that matters: choices must be maintainable under staffing reality.

## 9:00-11:00 - What We Build
- NASA/ESA mission applications with similar backend patterns and different mission constraints.
- Transition: this is why the old "write/run/debug" mental model eventually breaks down.

## 11:00-12:00 - What This Looks Like in Production
- Promise the audience concrete examples at the end (GeoViz, HPCA, Generic Conference, Generic SOC).
- Set expectation: repeated platform patterns are the key scaling mechanism for a 3-person team.

## 12:00-15:00 - Programs Run
- Acknowledge the standard model (write, run, output, debug).
- Prompt #1: "Where does this model break first in production?"

## 15:00-18:00 - Programs Move
- Code moves across environments.
- Data moves across pipeline stages.
- Events move between systems asynchronously.

## 18:00-22:00 - Your Code Travels Before It Runs
- Local != production.
- CI/CD, rollback, policy boundaries.
- Prompt #2: "What can fail between laptop and production?"

## 22:00-26:00 - Move Software to the Data
- ITAR/CUI constraints and extreme data scale (up to 500+ PB) make data movement the wrong default.
- Better pattern: move software to where data already resides.
- Containers/cloud patterns are implementation mechanisms, not the goal.

## 26:00-29:00 - Nothing Runs in Order Anymore
- Event-driven systems: delayed/duplicated/out-of-order messages are normal.
- Prompt #3: "What assumptions fail when timing is no longer guaranteed?"

## 29:00-33:00 - Tools Should Fit Inherited Infrastructure
- Docker/Podman, Git/Gitea, Sentry/GlitchTip, FrankenPHP (or current web stack).
- Key message: "Pick tools that fit your environment and team, not trend charts."

## 33:00-37:00 - Modularize or Drown
- Why "Generic Conference" and "Generic SOC" exist: we cannot custom-build everything per mission.
- Shared core modules + mission-specific adapters let a small team ship and support many systems.
- Prompt #4: "What should be a reusable module vs mission-specific code?"

## 37:00-40:00 - Computer Scientist vs Computer Engineer
- Real tradeoff: optimize ingest software vs add RAM.
- "Best" answer depends on correctness, schedule, hardware cost, and support burden.

## 40:00-43:00 - Outsourcing Reasoning
- AI now assists code/pipelines/design.
- PyScript/WASM extends this by changing where execution can happen (including client runtime).
- We increasingly operate code we did not entirely write by hand or fully inspect.

## 43:00-46:00 - Trust Is Part of the Architecture (XZ)
- Dependency trust is part of system risk.
- More automation/abstraction increases leverage and risk simultaneously.
- Optional reference: https://xkcd.com/2347/

## 46:00-48:00 - The Shift
- You are designing flows of code, data, and events across boundaries.
- Reliability-in-motion is the core competency.

## 48:00-52:00 - How Far Software Movement Goes (PyScript/WASM slide)
- Bridge statement: "Moving software to data is one step; moving software to client runtime is another."
- Point out PyScript/WASM cards as concrete examples of relocation strategy.

## 52:00-57:00 - App Examples (GeoViz, HPCA, Generic Conference, Generic SOC)
- Narrate pattern recognition: shared platform capabilities, mission-specific surface area.
- Call out Generic SOC explicitly: write once, configure/adapt per mission, reuse repeatedly.
- Tie back to modularization and maintainability for a 3-person team.

## 57:00-59:00 - What All This Gets Us
- Faster delivery, consistent operations, safer experimentation (including PyScript/WASM).
- "Not maximum complexity - maximum useful capability per maintenance dollar."

## 59:00-60:00 - Wrap-up + Q&A
- Final line: "The hard part isn't making software run once; it's keeping it trustworthy while it moves."
- Invite specific questions on tooling, modularization boundaries, and compliance/data-locality architecture.

---

## Optional time buffers (if running early/late)
- **If ahead by 2-3 min:** add one concrete RAM-vs-optimization story with numbers.
- **If behind by 2-3 min:** shorten AI + XZ to one combined risk slide narrative.

## Engagement prompts (3-5 total)
1. Where does the simple run/debug model break first for your team?
2. What can fail between laptop and production?
3. What breaks when timing assumptions are invalid?
4. What should be a shared module vs mission-specific?
