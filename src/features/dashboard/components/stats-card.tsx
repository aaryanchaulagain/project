import type { LucideIcon } from "lucide-react";

type StatsCardProps = {
  icon: LucideIcon;
  label: string;
  trend: string;
  value: string;
};

export function StatsCard({ icon: Icon, label, trend, value }: StatsCardProps) {
  return (
    <article className="rounded-2xl border bg-white p-6 shadow-sm">
      <div className="flex items-start justify-between">
        <div>
          <p className="text-sm font-medium text-slate-500">{label}</p>
          <p className="mt-3 text-2xl font-bold tracking-tight text-slate-950">
            {value}
          </p>
        </div>
        <div className="rounded-xl bg-blue-50 p-3 text-brand">
          <Icon className="h-5 w-5" aria-hidden="true" />
        </div>
      </div>
      <p className="mt-5 text-sm text-slate-600">{trend}</p>
    </article>
  );
}
