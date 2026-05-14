import type { Metadata } from "next";
import { LoginForm } from "@/features/auth/components/login-form";

export const metadata: Metadata = {
  title: "Sign in",
};

export default function LoginPage() {
  return (
    <div className="w-full max-w-md">
      <div className="mb-8">
        <h1 className="text-3xl font-bold tracking-tight text-slate-950">
          Welcome back
        </h1>
        <p className="mt-2 text-sm text-slate-600">
          Sign in to continue to your workspace.
        </p>
      </div>
      <LoginForm />
    </div>
  );
}
