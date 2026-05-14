import Link from "next/link";
import { ArrowRight, Building2, ShieldCheck, Workflow } from "lucide-react";
import { Container } from "@/components/ui/container";
import { Button } from "@/components/ui/button";
import { siteConfig } from "@/config/site";

const capabilities = [
  {
    icon: Building2,
    title: "Multi-tenant foundation",
    description:
      "Organizations, memberships, roles, audit logs, and feature flags are modeled from day one.",
  },
  {
    icon: ShieldCheck,
    title: "Production-minded defaults",
    description:
      "Strict TypeScript, structured env validation, Prisma MySQL, health checks, and route groups.",
  },
  {
    icon: Workflow,
    title: "Modular architecture",
    description:
      "Features, shared UI, configuration, and data access are separated for scalable ownership.",
  },
];

export default function MarketingPage() {
  return (
    <main>
      <section className="py-24 sm:py-32">
        <Container className="text-center">
          <p className="text-sm font-semibold uppercase tracking-[0.3em] text-brand">
            Next.js 15 starter
          </p>
          <h1 className="mx-auto mt-6 max-w-4xl text-4xl font-bold tracking-tight text-slate-950 sm:text-6xl">
            A production-ready foundation for {siteConfig.name}.
          </h1>
          <p className="mx-auto mt-6 max-w-2xl text-lg leading-8 text-slate-600">
            Start with an enterprise App Router structure that is ready for
            authentication, teams, dashboards, and MySQL-backed workflows.
          </p>
          <div className="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
            <Button asChild size="lg">
              <Link href="/dashboard">
                View dashboard
                <ArrowRight className="h-4 w-4" />
              </Link>
            </Button>
            <Button asChild variant="secondary" size="lg">
              <Link href="/login">Sign in</Link>
            </Button>
          </div>
        </Container>
      </section>

      <section className="border-y bg-white py-16" id="platform">
        <Container>
          <div className="grid gap-6 md:grid-cols-3">
            {capabilities.map((capability) => (
              <article
                className="rounded-2xl border bg-white p-6 shadow-sm"
                key={capability.title}
              >
                <div className="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-brand">
                  <capability.icon className="h-6 w-6" aria-hidden="true" />
                </div>
                <h2 className="mt-5 text-lg font-semibold text-slate-950">
                  {capability.title}
                </h2>
                <p className="mt-3 text-sm leading-6 text-slate-600">
                  {capability.description}
                </p>
              </article>
            ))}
          </div>
        </Container>
      </section>
    </main>
  );
}
