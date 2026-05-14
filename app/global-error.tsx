"use client";

import { Button } from "@/components/ui/button";

export default function GlobalError({
  error,
  reset,
}: {
  error: Error & { digest?: string };
  reset: () => void;
}) {
  return (
    <html lang="en">
      <body>
        <main className="flex min-h-screen items-center justify-center px-6">
          <div className="max-w-lg text-center">
            <p className="text-sm font-semibold uppercase tracking-wide text-red-600">
              Application error
            </p>
            <h1 className="mt-3 text-3xl font-bold tracking-tight">
              Something went wrong
            </h1>
            <p className="mt-4 text-slate-600">
              {error.digest
                ? `Error reference: ${error.digest}`
                : "The platform encountered an unexpected error."}
            </p>
            <Button className="mt-8" onClick={reset}>
              Try again
            </Button>
          </div>
        </main>
      </body>
    </html>
  );
}
