# IdleCalc — Idle Notation Calculator

A small, dependency-free web calculator for idle/incremental games that use
large-number suffix notation like `K`, `M`, `B`, `T`, `AA`, `BB`, ... instead
of writing out long strings of digits.

Live files: [`index.html`](index.html) · [`script.js`](script.js) · [`style.css`](style.css)

## Notation system

| Suffix                  | Power of 10                                   |
|-------------------------|-----------------------------------------------|
| *(none)*                | 10⁰                                           |
| `K`                     | 10³ (thousand)                                |
| `M`                     | 10⁶ (million)                                 |
| `B`                     | 10⁹ (billion)                                 |
| `T`                     | 10¹² (trillion)                               |
| `AA`, `BB`, ... `ZZ`    | 10¹⁵ – 10⁹⁰                                   |
| `AAA`, `BBB`, ... `ZZZ` | 10⁹³ – 10¹⁶⁸                                  |
| `AAAA`, `BBBB`, ...     | keeps going forever, +3 zeros per letter step |

Beyond `T`, each new tier repeats a letter one more time than the last, so
the suffix cycles `AA...ZZ`, then `AAA...ZZZ`, then `AAAA...ZZZZ`, and so on
indefinitely. This keeps the numbers sane (avoids floating-point overflow)
while still being fully extensible far past `ZZ`.

## Features

- **Basic arithmetic** on notated values: `+`, `−`, `×`, `÷`
  (e.g. `330LL ÷ 40JJ`)
- **Time to Goal** — enter a goal, your current amount, and your rate to get
  time remaining broken down into years / days / hours / minutes / seconds
- **Rate Needed** — enter a goal, current amount, and a target time to find
  the rate required to hit it
- **Projected Earnings** (reverse calculation) — "how much will I have after
  X hours at this rate?"
- **Automatic notation formatting** — raw numbers are converted back into
  clean notation (e.g. `8250000` → `8.25M`)
- **Adjustable decimal precision** for displayed results
- **Idle-game-styled dark UI** with tabbed calculation modes

## Usage

Just open [`index.html`](index.html) in a browser — everything runs
client-side in vanilla JavaScript, no build step or server required.

Example inputs:

```
330LL ÷ 40JJ  =  8,250,000 seconds  ≈  95.5 days
```

## Possible future improvements

- A lookup table / database of notation systems used by specific popular
  idle games (many use different suffix schemes or named "illions")
- Shareable/permalink calculations via URL query params
- Support for scientific notation input/output for extremely large numbers
- Unit tests for the parsing/formatting logic
