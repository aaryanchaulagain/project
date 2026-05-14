export default function DashboardLoading() {
  return (
    <div className="space-y-6">
      <div className="h-8 w-64 animate-pulse rounded-lg bg-slate-200" />
      <div className="grid gap-4 md:grid-cols-3">
        {Array.from({ length: 3 }).map((_, index) => (
          <div
            className="h-36 animate-pulse rounded-2xl border bg-slate-100"
            key={index}
          />
        ))}
      </div>
    </div>
  );
}
