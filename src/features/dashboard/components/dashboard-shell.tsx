import Link from "next/link";
import { Container } from "@/components/ui/container";
import { dashboardNav } from "@/config/nav";

export function DashboardShell({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <div className="min-h-screen bg-slate-50">
      <aside className="fixed inset-y-0 left-0 hidden w-64 border-r bg-white p-6 lg:block">
        <Link className="text-lg font-bold tracking-tight" href="/">
          Enterprise Platform
        </Link>
        <nav className="mt-10 space-y-1" aria-label="Dashboard navigation">
          {dashboardNav.map((item) => (
            <Link
              className="block rounded-lg px-3 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-950"
              href={item.href}
              key={item.href}
            >
              {item.label}
            </Link>
          ))}
        </nav>
      </aside>
      <div className="lg:pl-64">
        <header className="sticky top-0 z-30 border-b bg-white/90 backdrop-blur">
          <Container className="flex h-16 items-center justify-between lg:max-w-none">
            <p className="text-sm font-medium text-slate-600">
              Organization: Acme Inc.
            </p>
            <Link
              className="text-sm font-medium text-slate-600 hover:text-slate-950"
              href="/"
            >
              Back to site
            </Link>
          </Container>
        </header>
        <Container className="py-10 lg:max-w-none">{children}</Container>
      </div>
    </div>
  );
}
