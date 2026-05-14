# INN Group Platform

Production-grade unified corporate platform for INN Group, Innovative Associates, and Innovative Wealth.

## Stack

- Next.js 15 App Router
- TypeScript
- TailwindCSS 4
- Prisma ORM
- MySQL
- Framer Motion page transitions
- GSAP scroll reveal/parallax effects
- Shadcn-style reusable UI primitives

## Routes

- `/`, `/about`, `/services`, `/contact`
- `/associates`, `/associates/tax-lodgement`, `/associates/accounting`, `/associates/business-advisory`
- `/wealth`, `/wealth/financial-planning`, `/wealth/investment`, `/wealth/retirement`
- `/admin`, `/admin/contacts`, `/admin/content`

## Local setup

```bash
npm install
cp .env.example .env
# update DATABASE_URL with MySQL credentials
npm run db:generate
npm run db:push
npm run db:seed
npm run dev
```

## Production deployment

1. Provision a MySQL database.
2. Set environment variables:
   - `DATABASE_URL`
   - `NEXT_PUBLIC_SITE_URL`
   - `ADMIN_EMAIL`
   - `ADMIN_PASSWORD`
3. Install dependencies with `npm ci`.
4. Run `npm run build`.
5. Apply migrations with `npm run db:migrate` (or `npm run db:push` for first non-migrated deployment).
6. Seed initial content with `npm run db:seed`.
7. Start with `npm run start`.

## Content and CMS

The static public pages preserve the available page copy and structure fetched from the existing websites. Prisma models provide a CMS-ready data model for brands, pages, sections, services, team members, testimonials, contact submissions, site settings, and admin users. Contact forms store submissions in MySQL through `/api/contact`.

## Notes

Some requested service detail URLs on the source websites returned 404 during build-out. Their new pages are created from the corresponding service copy and taxonomy available on the source homepages.
