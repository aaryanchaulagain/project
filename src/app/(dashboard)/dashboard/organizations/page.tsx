import type { Metadata } from "next";

export const metadata: Metadata = {
  title: "Organizations",
};

export default function OrganizationsPage() {
  return (
    <div className="rounded-2xl border bg-white p-6 shadow-sm">
      <h1 className="text-2xl font-bold tracking-tight text-slate-950">
        Organizations
      </h1>
      <p className="mt-3 max-w-2xl text-sm leading-6 text-slate-600">
        Extend this module with organization onboarding, member invitations,
        billing ownership, and per-tenant settings.
      </p>
    </div>
  );
}
