import { Button } from "@/components/ui/button";

export function LoginForm() {
  return (
    <form className="space-y-5">
      <div>
        <label
          className="text-sm font-medium text-slate-700"
          htmlFor="email"
        >
          Email
        </label>
        <input
          autoComplete="email"
          className="mt-2 h-11 w-full rounded-lg border px-3 text-sm outline-none transition focus:border-brand focus:ring-4 focus:ring-blue-100"
          id="email"
          name="email"
          placeholder="owner@example.com"
          type="email"
        />
      </div>
      <div>
        <label
          className="text-sm font-medium text-slate-700"
          htmlFor="password"
        >
          Password
        </label>
        <input
          autoComplete="current-password"
          className="mt-2 h-11 w-full rounded-lg border px-3 text-sm outline-none transition focus:border-brand focus:ring-4 focus:ring-blue-100"
          id="password"
          name="password"
          placeholder="••••••••"
          type="password"
        />
      </div>
      <Button className="w-full" type="submit">
        Sign in
      </Button>
      <p className="text-center text-xs text-slate-500">
        Wire this form to your preferred auth provider or server action.
      </p>
    </form>
  );
}
