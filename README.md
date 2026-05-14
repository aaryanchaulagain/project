# Enterprise Platform

Production-ready platform scaffold built with Next.js 15 App Router,
TypeScript, TailwindCSS, Prisma, and MySQL.

## Stack

- Next.js 15 App Router with route groups
- TypeScript with strict compiler settings
- TailwindCSS v4
- Prisma ORM with MySQL
- Modular `src/` architecture for enterprise-scale ownership

## Quick start

```bash
npm install
cp .env.example .env
npm run db:generate
npm run dev
```

Open [http://localhost:3000](http://localhost:3000).

## Environment

Copy one of the example files and provide real values:

```bash
cp .env.example .env
```

Required variables:

```bash
NODE_ENV="development"
NEXT_PUBLIC_APP_NAME="Enterprise Platform"
NEXT_PUBLIC_APP_URL="http://localhost:3000"
DATABASE_URL="mysql://root:password@localhost:3306/enterprise_platform"
```

## Common commands

```bash
npm run dev          # start local development
npm run build        # create production build
npm run start        # run production server
npm run lint         # lint project
npm run typecheck    # run TypeScript checks
npm run db:generate  # generate Prisma client
npm run db:push      # sync Prisma schema to MySQL
npm run db:migrate   # create and run a migration
npm run db:seed      # seed local data
```

## Architecture

See [docs/project-structure.md](docs/project-structure.md) for the generated
folder structure, install commands, and database workflow.
