export default function AuthLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <main className="grid min-h-screen bg-white lg:grid-cols-2">
      <section className="hidden bg-slate-950 p-12 text-white lg:flex lg:flex-col lg:justify-between">
        <div className="text-lg font-semibold">Enterprise Platform</div>
        <div>
          <p className="text-3xl font-bold tracking-tight">
            Build secure workflows on a scalable platform foundation.
          </p>
          <p className="mt-4 text-sm leading-6 text-slate-300">
            This route group is reserved for authentication pages and keeps
            public, auth, and protected dashboard concerns separate.
          </p>
        </div>
      </section>
      <section className="flex items-center justify-center px-6 py-12">
        {children}
      </section>
    </main>
  );
}
