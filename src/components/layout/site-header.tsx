import Link from "next/link";
import { Container } from "@/components/ui/container";
import { Button } from "@/components/ui/button";
import { mainNav } from "@/config/nav";
import { siteConfig } from "@/config/site";

export function SiteHeader() {
  return (
    <header className="sticky top-0 z-40 border-b bg-white/90 backdrop-blur">
      <Container className="flex h-16 items-center justify-between">
        <Link className="text-base font-bold tracking-tight" href="/">
          {siteConfig.name}
        </Link>
        <nav
          aria-label="Main navigation"
          className="hidden items-center gap-8 md:flex"
        >
          {mainNav.map((item) => (
            <Link
              className="text-sm font-medium text-slate-600 transition-colors hover:text-slate-950"
              href={item.href}
              key={item.href}
            >
              {item.label}
            </Link>
          ))}
        </nav>
        <Button asChild size="sm" variant="secondary">
          <Link href="/login">Sign in</Link>
        </Button>
      </Container>
    </header>
  );
}
