/* ==========================================================================
   Idle Notation Calculator
   --------------------------------------------------------------------------
   Notation system:
     K  = 10^3   M = 10^6   B = 10^9   T = 10^12
   Beyond T, suffixes continue as repeated-letter combinations, one tier per
   letter of the alphabet, each step adding another power of 10^3:
     AA = 10^15   BB = 10^18   CC = 10^21   ...   ZZ = 10^90
   Once ZZ is reached, the notation naturally extends with triple letters,
   then quadruple, and so on, forever:
     AAA = 10^93   BBB = 10^96   ...   ZZZ = 10^168   AAAA = 10^171 ...
   (Using plain repeated letters - rather than every possible two-letter
   combination - keeps the exponents sane and avoids overflowing standard
   floating point numbers while still supporting arbitrarily large tiers.)
   ========================================================================== */

const FIXED_SUFFIXES = { '': 0, K: 1, M: 2, B: 3, T: 4 };
const FIXED_SUFFIXES_REV = ['', 'K', 'M', 'B', 'T'];

/** Given a "tier" (exponent / 3), return the display suffix. */
function tierToSuffix(tier) {
  if (tier <= 0) return '';
  if (tier <= 4) return FIXED_SUFFIXES_REV[tier];
  const rel = tier - 4;              // 1-indexed position among letter tiers
  const repeats = Math.floor((rel - 1) / 26) + 2; // 2 for AA-ZZ, 3 for AAA-ZZZ, ...
  const letterPos = ((rel - 1) % 26) + 1;         // 1-26 -> A-Z
  const letter = String.fromCharCode(64 + letterPos);
  return letter.repeat(repeats);
}

/** Given a suffix string, return its tier (exponent / 3), or null if invalid. */
function suffixToTier(suffix) {
  if (suffix === '') return 0;
  const upper = suffix.toUpperCase();
  if (upper in FIXED_SUFFIXES) return FIXED_SUFFIXES[upper];
  // Must be a run of 2+ identical letters, e.g. AA, BB, ZZZ, AAAA...
  if (!/^([A-Z])\1+$/.test(upper)) return null;
  const letterPos = upper.charCodeAt(0) - 64; // 1-26
  const repeats = upper.length;
  const rel = 26 * (repeats - 2) + letterPos;
  return 4 + rel;
}

/** Parse a string like "330LL", "40JJ", "1.5M", "8250000" into a plain number. */
function parseIdleNumber(input) {
  if (input == null) return NaN;
  const str = String(input).trim().replace(/,/g, '');
  if (str === '') return NaN;
  const match = str.match(/^(-?\d*\.?\d+)\s*([A-Za-z]*)$/);
  if (!match) return NaN;
  const mantissa = parseFloat(match[1]);
  const tier = suffixToTier(match[2]);
  if (tier === null || Number.isNaN(mantissa)) return NaN;
  return mantissa * Math.pow(10, tier * 3);
}

/** Format a plain number back into idle notation, e.g. 8250000 -> "8.25M". */
function formatIdleNumber(num, precision = 2) {
  if (!Number.isFinite(num)) return '—';
  if (num === 0) return (0).toFixed(precision).replace(/\.?0+$/, '') || '0';
  const negative = num < 0;
  const abs = Math.abs(num);
  let tier = abs < 1000 ? 0 : Math.floor(Math.log10(abs) / 3);
  let mantissa = abs / Math.pow(10, tier * 3);
  // Guard against floating point pushing mantissa to 1000 (e.g. 999.999 -> 1000)
  if (mantissa >= 1000) {
    tier += 1;
    mantissa = abs / Math.pow(10, tier * 3);
  }
  const suffix = tierToSuffix(tier);
  let text = mantissa.toFixed(precision);
  // trim trailing zeros / dangling decimal point for cleanliness
  if (text.includes('.')) text = text.replace(/0+$/, '').replace(/\.$/, '');
  return (negative ? '-' : '') + text + suffix;
}

/* ---------------------------- Time helpers ------------------------------ */

const TIME_UNITS = [
  { key: 'seconds', label: 'Seconds', perSecond: 1 },
  { key: 'minutes', label: 'Minutes', perSecond: 60 },
  { key: 'hours', label: 'Hours', perSecond: 3600 },
  { key: 'days', label: 'Days', perSecond: 86400 },
  { key: 'years', label: 'Years', perSecond: 31557600 } // 365.25 days
];

function timeToSeconds(value, unitKey) {
  const unit = TIME_UNITS.find(u => u.key === unitKey);
  return value * unit.perSecond;
}

function secondsToBreakdown(totalSeconds) {
  if (!Number.isFinite(totalSeconds)) return null;
  let remaining = Math.max(0, totalSeconds);
  const years = Math.floor(remaining / TIME_UNITS[4].perSecond);
  remaining -= years * TIME_UNITS[4].perSecond;
  const days = Math.floor(remaining / TIME_UNITS[3].perSecond);
  remaining -= days * TIME_UNITS[3].perSecond;
  const hours = Math.floor(remaining / TIME_UNITS[2].perSecond);
  remaining -= hours * TIME_UNITS[2].perSecond;
  const minutes = Math.floor(remaining / TIME_UNITS[1].perSecond);
  remaining -= minutes * TIME_UNITS[1].perSecond;
  const seconds = remaining;
  return { years, days, hours, minutes, seconds };
}

function formatBreakdown(totalSeconds) {
  const b = secondsToBreakdown(totalSeconds);
  if (!b) return '—';
  const parts = [];
  if (b.years) parts.push(`${b.years}y`);
  if (b.days) parts.push(`${b.days}d`);
  if (b.hours) parts.push(`${b.hours}h`);
  if (b.minutes) parts.push(`${b.minutes}m`);
  parts.push(`${b.seconds.toFixed(b.seconds % 1 === 0 ? 0 : 2)}s`);
  return parts.join(' ');
}

/* ---------------------------------- UI ----------------------------------- */

function getPrecision() {
  const el = document.getElementById('precision');
  const val = parseInt(el.value, 10);
  return Number.isFinite(val) ? Math.min(Math.max(val, 0), 10) : 2;
}

function showResult(boxId, html, isError = false) {
  const box = document.getElementById(boxId);
  box.innerHTML = html;
  box.classList.toggle('error', isError);
  box.classList.add('visible');
}

function readValue(id) {
  return parseIdleNumber(document.getElementById(id).value);
}

/* --- Tab: Basic arithmetic --- */
function calcBasic() {
  const a = readValue('basicA');
  const b = readValue('basicB');
  const op = document.getElementById('basicOp').value;
  if (Number.isNaN(a) || Number.isNaN(b)) {
    showResult('basicResult', 'Please enter two valid values (e.g. <code>330LL</code>, <code>1.5M</code>).', true);
    return;
  }
  let result;
  switch (op) {
    case '+': result = a + b; break;
    case '-': result = a - b; break;
    case '*': result = a * b; break;
    case '/':
      if (b === 0) { showResult('basicResult', 'Cannot divide by zero.', true); return; }
      result = a / b; break;
  }
  const precision = getPrecision();
  showResult('basicResult',
    `<strong>${formatIdleNumber(result, precision)}</strong> <span class="raw">(${result.toExponential(6)})</span>`);
}

/* --- Tab: Time to goal (Goal ÷ rate, Current → goal) --- */
function calcTimeToGoal() {
  const goal = readValue('ttgGoal');
  const current = document.getElementById('ttgCurrent').value.trim() === ''
    ? 0 : readValue('ttgCurrent');
  const rate = readValue('ttgRate');
  if (Number.isNaN(goal) || Number.isNaN(current) || Number.isNaN(rate)) {
    showResult('ttgResult', 'Please enter valid goal, current amount, and rate.', true);
    return;
  }
  const remaining = goal - current;
  if (remaining <= 0) {
    showResult('ttgResult', `You already have enough! Surplus: <strong>${formatIdleNumber(-remaining, getPrecision())}</strong>`);
    return;
  }
  if (rate <= 0) {
    showResult('ttgResult', 'Rate must be greater than zero.', true);
    return;
  }
  const seconds = remaining / rate;
  showResult('ttgResult',
    `Need <strong>${formatIdleNumber(remaining, getPrecision())}</strong> more.<br>` +
    `Time to goal: <strong>${formatBreakdown(seconds)}</strong> ` +
    `<span class="raw">(${seconds.toLocaleString(undefined, { maximumFractionDigits: 2 })} seconds)</span>`);
}

/* --- Tab: Rate needed --- */
function calcRateNeeded() {
  const goal = readValue('rnGoal');
  const current = document.getElementById('rnCurrent').value.trim() === ''
    ? 0 : readValue('rnCurrent');
  const timeVal = parseFloat(document.getElementById('rnTime').value);
  const unit = document.getElementById('rnUnit').value;
  if (Number.isNaN(goal) || Number.isNaN(current) || !Number.isFinite(timeVal) || timeVal <= 0) {
    showResult('rnResult', 'Please enter a valid goal, current amount, and time.', true);
    return;
  }
  const remaining = goal - current;
  if (remaining <= 0) {
    showResult('rnResult', 'You already have enough! No additional rate needed.');
    return;
  }
  const seconds = timeToSeconds(timeVal, unit);
  const rate = remaining / seconds;
  showResult('rnResult',
    `Required rate: <strong>${formatIdleNumber(rate, getPrecision())}/s</strong> ` +
    `<span class="raw">(${rate.toExponential(6)}/s)</span>`);
}

/* --- Tab: Projected earnings (reverse calculation) --- */
function calcProjection() {
  const rate = readValue('projRate');
  const timeVal = parseFloat(document.getElementById('projTime').value);
  const unit = document.getElementById('projUnit').value;
  const startingRaw = document.getElementById('projStart').value.trim();
  const starting = startingRaw === '' ? 0 : readValue('projStart');
  if (Number.isNaN(rate) || !Number.isFinite(timeVal) || timeVal < 0 || Number.isNaN(starting)) {
    showResult('projResult', 'Please enter a valid rate and time.', true);
    return;
  }
  const seconds = timeToSeconds(timeVal, unit);
  const earned = rate * seconds;
  const total = starting + earned;
  showResult('projResult',
    `Earned in that time: <strong>${formatIdleNumber(earned, getPrecision())}</strong><br>` +
    `Projected total: <strong>${formatIdleNumber(total, getPrecision())}</strong>`);
}

/* --- Tab switching --- */
function initTabs() {
  const tabs = document.querySelectorAll('.tab-button');
  tabs.forEach(btn => {
    btn.addEventListener('click', () => {
      tabs.forEach(b => b.classList.remove('active'));
      document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
      btn.classList.add('active');
      document.getElementById(btn.dataset.tab).classList.add('active');
    });
  });
}

function initEnterKey() {
  document.querySelectorAll('.tab-panel').forEach(panel => {
    panel.addEventListener('keydown', e => {
      if (e.key === 'Enter') {
        const btn = panel.querySelector('button.calculate');
        if (btn) btn.click();
      }
    });
  });
}

document.addEventListener('DOMContentLoaded', () => {
  initTabs();
  initEnterKey();
  document.getElementById('basicCalc').addEventListener('click', calcBasic);
  document.getElementById('ttgCalc').addEventListener('click', calcTimeToGoal);
  document.getElementById('rnCalc').addEventListener('click', calcRateNeeded);
  document.getElementById('projCalc').addEventListener('click', calcProjection);
});
