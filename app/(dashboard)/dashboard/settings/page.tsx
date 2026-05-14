import type { Metadata } from "next";

export const metadata: Metadata = {
  title: "Settings",
};

export default function SettingsPage() {
  return (
    <div className="rounded-2xl border bg-white p-6 shadow-sm">
      <h1 className="text-2xl font-bold tracking-tight text-slate-950">
        Settings
      </h1>
      <p className="mt-3 max-w-2xl text-sm leading-6 text-slate-600">
        Use this module for account preferences, organization policies, API
        keys, feature flag controls, and platform-level configuration.
      </p>
    </div>
  );
}
