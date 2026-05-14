"use client";

import { Button } from "@/components/ui/button";

export default function DashboardError({
  reset,
}: {
  error: Error;
  reset: () => void;
}) {
  return (
    <div className="rounded-2xl border border-red-200 bg-red-50 p-6">
      <h2 className="text-lg font-semibold text-red-900">
        Dashboard failed to load
      </h2>
      <p className="mt-2 text-sm text-red-700">
        Retry the request or inspect the application logs if this continues.
      </p>
      <Button className="mt-5" onClick={reset} variant="secondary">
        Retry
      </Button>
    </div>
  );
}
