# RecruiterHub — Design Specification

## 1. Visual Source of Truth
All UI screens must strictly match the uploaded design screenshots (33 pages).
- Tech Stack: Plain HTML, Blade, and ONE single CSS file (`public/css/style.css`).
- No Bootstrap, no Tailwind, no CSS/JS libraries, no JavaScript.
- Standalone `/interactions/create?recruiter=ID` uses the centered form card style (matching Page 17 layout with "Log interaction" title and "Save interaction" button).

---

## 2. Screen List Mapped to Route & Blade File

| Screen Name | PDF Page | Route (Name) | Blade File (`resources/views/...`) |
|---|---|---|---|
| Login | 1, 19, 32–33 | `GET /login` (`login`) | `auth/login.blade.php` |
| Register | 2, 20 | `GET /register` (`register`) | `auth/register.blade.php` |
| Dashboard | 3, 26–29 | `GET /dashboard` (`dashboard`) | `dashboard.blade.php` |
| Recruiters List (+ Empty) | 4, 25, 30–31 | `GET /recruiters` (`recruiters.index`) | `recruiters/index.blade.php` |
| Recruiter Detail | 5 | `GET /recruiters/{id}` (`recruiters.show`) | `recruiters/show.blade.php` |
| Add Recruiter | 6 | `GET /recruiters/create` (`recruiters.create`) | `recruiters/create.blade.php` |
| Edit Recruiter | 7 | `GET /recruiters/{id}/edit` (`recruiters.edit`) | `recruiters/edit.blade.php` |
| Delete Recruiter Confirm | 8 | `GET /recruiters/{id}/delete` (`recruiters.delete`) | `recruiters/delete.blade.php` |
| Companies List | 9 | `GET /companies` (`companies.index`) | `companies/index.blade.php` |
| Add Company | 10, 21 | `GET /companies/create` (`companies.create`) | `companies/create.blade.php` |
| Company Detail | 11 | `GET /companies/{id}` (`companies.show`) | `companies/show.blade.php` |
| Edit Company | 15 | `GET /companies/{id}/edit` (`companies/edit`) | `companies/edit.blade.php` |
| Delete Company Confirm | 16 | `GET /companies/{id}/delete` (`companies.delete`) | `companies/delete.blade.php` |
| Interactions List & Quick Log | 12, 22 | `GET /interactions` (`interactions.index`) | `interactions/index.blade.php` |
| Add Interaction (Standalone) | 12 / 17 style | `GET /interactions/create` (`interactions.create`) | `interactions/create.blade.php` |
| Edit Interaction | 17 | `GET /interactions/{id}/edit` (`interactions.edit`) | `interactions/edit.blade.php` |
| Delete Interaction Confirm | 18 | `GET /interactions/{id}/delete` (`interactions.delete`) | `interactions/delete.blade.php` |
| Source Effectiveness Report | 13 | `GET /reports/source` (`reports.source`) | `reports/source.blade.php` |
| Trash (3 Tabs) | 14, 23, 24 | `GET /trash` (`trash.index`) | `trash/index.blade.php` |

Layouts & Partials:
- `resources/views/layouts/app.blade.php`
- `resources/views/layouts/auth.blade.php`
- `resources/views/partials/sidebar.blade.php`
- `resources/views/partials/topbar.blade.php`
- `resources/views/partials/flash.blade.php`
- `resources/views/partials/freshness-badge.blade.php`
- `resources/views/errors/403.blade.php`
- `resources/views/errors/404.blade.php`

---

## 3. Global Design Tokens

### Colors
- Page Background: `#F6F7FB`
- Surface / Card / Sidebar / Topbar: `#FFFFFF`
- Border / Divider: `#E4E7EC`
- Input Border: `#D0D5DD`
- Primary Gradient (Auth Hero / Best Source Banner): `linear-gradient(135deg, #3730A3 0%, #5B5BD6 50%, #7C5CFA 100%)`
- Primary Button Gradient: `linear-gradient(90deg, #5B5BD6 0%, #7C5CFA 100%)`
- Primary Link / Active Text: `#4F46E5` / `#5B5BD6`
- Active Nav / Selected Chip Bg: `#EEF2FF` (border `#C7D2FE` or `#5B5BD6`)
- Heading & Primary Text: `#101828`
- Muted / Secondary Text: `#667085`
- Table Header Bg: `#F9FAFB`

### Status & Freshness Pills
- Green (`Recently Contacted`, `Replied`): text `#027A48`, bg `#ECFDF3`
- Amber (`Needs Follow-up`): text `#B54708`, bg `#FFFAEB`
- Grey (`Inactive`, `Cold`, `No reply`, `Low data`): text `#475467`, bg `#F2F4F7`
- Blue (`Active` status): text `#3538CD`, bg `#EEF4FF`
- Purple (`New` status): text `#6941C6`, bg `#F4F3FF`

### Danger & Error Colors
- Danger Button (`Move to trash`): `#D92D20` (hover `#B42318`)
- Danger Text (`Delete`, `Delete forever`, error text): `#D92D20` / `#B42318`
- Error Input Border: `#F04438` with ring `0 0 0 3px rgba(240, 68, 56, 0.12)`
- Trash Icon Square Bg: `#FEE4E2`

### Typography
- Font Family: `'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif`
- Auth Hero Heading: `36px`, weight `700`
- Page Title: `24px–26px`, weight `700`
- Stat Big Number: `28px–32px`, weight `700`
- Section / Card Title: `16px–18px`, weight `600–700`
- Body / Table / Inputs: `14px`, weight `400–500`
- Helper / Pills / Subtitle: `12px–13px`, weight `500`
- Table Headers / Sidebar Group Labels: `11px`, uppercase, weight `600`, letter-spacing `0.05em`

### Spacing Scale
`4px`, `8px`, `12px`, `16px`, `20px`, `24px`, `32px`

### Border Radius
- Cards: `16px`
- Auth Glass Preview Cards: `14px`
- Company Square Icon: `12px`
- Buttons / Inputs / Nav Items / Chips: `8px–10px`
- Pills / Avatars: `9999px`

### Shadows
- Cards: `0 1px 2px rgba(16, 24, 40, 0.04)`
- Primary Button: `0 4px 12px rgba(91, 91, 214, 0.25)`

---

## 4. Component Catalogue
1. **Sidebar (240px desktop):** White bg, right border `#E4E7EC`, brand logo at top, nav links (`Dashboard`, `Recruiters` + count badge, `Companies`, `Interactions`), `INSIGHTS` (`Source Report`), `MANAGE` (`Trash` + count badge), bottom user card (`RS` avatar + name + email) + `Log out` POST button.
2. **Top Bar (64px):** White bg, bottom border `#E4E7EC`, global search form (`Search recruiters, companies`), right `RS` initials avatar.
3. **Buttons:** Primary purple gradient, Secondary white bordered (`#D0D5DD`), Danger red solid (`#D92D20`), Text links (`View`, `Edit` blue/indigo; `Delete`, `Delete forever` red).
4. **Pills:** `9999px` radius with `6px` dot before label; Source tag bordered chip.
5. **Avatars:** Circular pastel initials (`36px–40px`, `56px` on detail); Company square (`40px–48px`, `12px` radius).
6. **Cards & Stat Cards:** White `16px` radius cards; Stat cards have `40px` pastel icon box + label + big count + green/muted sub-text.
7. **Tables:** `#F9FAFB` header row, `1px solid #EAECF0` row borders inside `16px` white card.
8. **Forms & Error State:** Label above `42px` input; error turns border `#F04438` and renders `12px` red error below field.
9. **Radio Chip Selectors:** Pure CSS hidden radio `<input>` + styled `<label>` chip (`:checked + label` gets `#EEF2FF` bg & `#5B5BD6` border).
10. **Progress & Funnel Bars:** CSS width `%` bars for status breakdown, 3-segment stacked bar for Freshness, dual-tone bar for Source Report funnel.
11. **Timeline:** Month heading (`OCTOBER`) + icon circles + interaction type, date, and summary.
12. **Empty State:** Centered white card with `48px` soft purple icon box, heading, description, primary CTA button.
13. **Mobile Nav (`<= 768px`):** Sidebar hidden; sticky top bar + horizontal scrollable pill tabs below; grids stack to 1 column.

---

## 5. Layout Notes Per Screen
- **Login / Register:** 50/50 split on desktop (left gradient branding + 2 preview cards, right white form); stacked on mobile.
- **Dashboard:** 4-col stat cards row, then 3-col analytics row (`By status`, `Follow up today`, `Freshness`).
- **Recruiters List:** Header + CTA, status tabs, 3-control filter bar, freshness rule line, table + pagination (or empty card).
- **Recruiter Detail:** Header summary card, then 2-col split (Left 65% `Interaction timeline`, Right 35% `Contact` + `Notes` + `Move to trash` link).
- **Add / Edit Recruiter:** 2-col split (Left 68% `Basic information` + `Company, source and status` cards; Right 32% `Tips` card + Save/Cancel buttons).
- **Companies List:** Header + CTA, 3-col company card grid with initials bubbles & recruiter count pill.
- **Add / Edit Company:** Single left-aligned card (`max-width: 680px`).
- **Company Detail:** Top company header card + full-width recruiters table.
- **Interactions List & Log:** 2-col split (Left 65% type tabs + interaction list; Right 35% `Log interaction` form card).
- **Edit / Standalone Create Interaction:** Single form card (`max-width: 640px`).
- **Delete Confirmations:** Centered card (`max-width: 440px`) with trash icon, question, helper note, `Cancel` & `Move to trash`.
- **Source Report:** Purple `BEST SOURCE` banner, 3 stat cards, funnel table + bottom rule note.
- **Trash:** 3 tabs with counts + table with `Restore` and `Delete forever`.