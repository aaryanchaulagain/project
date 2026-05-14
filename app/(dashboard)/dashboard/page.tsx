import type { Metadata } from "next";
import { Activity, Building2, Users } from "lucide-react";
import { StatsCard } from "@/features/dashboard/components/stats-card";

export const metadata: Metadata = {
  title: "Dashboard",
};

const stats = [
  {
    label: "Organizations",
    value: "1",
    icon: Building2,
    trend: "Ready for multi-tenant growth",
  },
  {
    label: "Members",
    value: "1",
    icon: Users,
    trend: "Seed owner included",
  },
  {
    label: "System status",
    value: "Healthy",
    icon: Activity,
    trend: "Health route available at /api/health",
  },
];

export default function DashboardPage() {
  return (
    <div className="space-y-8">
      <div>
        <p className="text-sm font-medium uppercase tracking-wide text-brand">
          Overview
        </p>
        <h1 className="mt-2 text-3xl font-bold tracking-tight text-slate-950">
          Platform dashboard
        </h1>
        <p className="mt-2 max-w-2xl text-sm leading-6 text-slate-600">
          This protected route group is prepared for role-based navigation,
          organization context, and data-driven product modules.
        </p>
      </div>

      <section className="grid gap-4 md:grid-cols-3">
        {stats.map((stat) => (
          <StatsCard key={stat.label} {...stat} />
        ))}
      </section>
    </div>
  );
}
