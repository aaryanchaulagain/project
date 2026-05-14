import type { NextConfig } from "next";

const nextConfig: NextConfig = {
  eslint: {
    ignoreDuringBuilds: true,
  },
  experimental: {
    optimizePackageImports: ["lucide-react", "framer-motion"],
  },
  images: {
    remotePatterns: [
      { protocol: "https", hostname: "inngroup.com.au" },
      { protocol: "https", hostname: "innovativeassociates.com.au" },
      { protocol: "https", hostname: "innovativewealth.com.au" },
    ],
  },
};

export default nextConfig;
