# Project Structure

This scaffold uses the Next.js App Router in the root `app/` directory so
Next.js discovers route groups correctly. Shared application code lives under
`src/`.

```txt
app/
  (auth)/                   Authentication routes
  (dashboard)/              Protected product routes
  (marketing)/              Public marketing routes
  api/health/               Health check endpoint
  globals.css               TailwindCSS v4 entrypoint and design tokens
  layout.tsx                Root metadata, viewport, and providers
src/
  components/
    layout/                 Shared layout primitives
    providers/              App-level client providers
    ui/                     Reusable UI components
  config/                   Navigation and site configuration
  features/
    auth/                   Auth feature components
    dashboard/              Dashboard feature components
  generated/prisma/         Generated Prisma client (ignored)
  lib/                      Shared utilities, env parsing, Prisma client
  server/
    auth/                   Server-only auth/session helpers
    db/                     Database entrypoints
    services/               Business/domain services
  types/                    Shared TypeScript types
prisma/
  schema.prisma             MySQL data model
  seed.ts                   Local seed script
```

## Install commands

```bash
npm install
cp .env.example .env
npm run db:generate
npm run dev
```

## Database commands

```bash
npm run db:push      # sync schema during early development
npm run db:migrate   # create a migration once the schema is stable
npm run db:seed      # seed local development data
npm run db:studio    # open Prisma Studio
```

## Validation commands

```bash
npm run lint
npm run typecheck
npm run build
```
