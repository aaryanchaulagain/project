import type { ReactNode } from "react";
import { SmoothScroll } from "@/components/animations/smooth-scroll";
import { SiteFooter } from "@/components/layout/site-footer";
import { SiteHeader } from "@/components/layout/site-header";

export default function PlatformLayout({ children }: { children: ReactNode }) {
  return (
    <>
      <SiteHeader />
      <SmoothScroll />
      {children}
      <SiteFooter />
    </>
  );
}
