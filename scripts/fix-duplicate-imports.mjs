import { promises as fs } from 'node:fs';
import path from 'node:path';

const defaultTargets = ['resources/js', 'vite.config.js'];
const extensions = new Set(['.js', '.jsx', '.mjs', '.cjs', '.ts', '.tsx']);
const importLinePattern = /^\s*import\s.+?;\s*$/;

async function pathExists(target) {
    try {
        await fs.access(target);
        return true;
    } catch {
        return false;
    }
}

async function collectFiles(target) {
    const absoluteTarget = path.resolve(target);

    if (!(await pathExists(absoluteTarget))) {
        return [];
    }

    const stat = await fs.stat(absoluteTarget);

    if (stat.isFile()) {
        return extensions.has(path.extname(absoluteTarget)) ? [absoluteTarget] : [];
    }

    const entries = await fs.readdir(absoluteTarget, { withFileTypes: true });
    const files = await Promise.all(entries.map((entry) => {
        const entryPath = path.join(absoluteTarget, entry.name);

        if (entry.isDirectory()) {
            return collectFiles(entryPath);
        }

        if (entry.isFile() && extensions.has(path.extname(entry.name))) {
            return [entryPath];
        }

        return [];
    }));

    return files.flat();
}

async function fixFile(file) {
    const original = await fs.readFile(file, 'utf8');
    const lines = original.split(/\r?\n/);
    const seenImports = new Set();
    let changed = false;

    const nextLines = lines.filter((line) => {
        if (!importLinePattern.test(line)) {
            return true;
        }

        const normalized = line.trim();

        if (seenImports.has(normalized)) {
            changed = true;
            return false;
        }

        seenImports.add(normalized);
        return true;
    });

    if (!changed) {
        return false;
    }

    await fs.writeFile(file, nextLines.join('\n'), 'utf8');
    return true;
}

const targets = process.argv.slice(2);
const files = (await Promise.all((targets.length ? targets : defaultTargets).map(collectFiles))).flat();
const uniqueFiles = [...new Set(files)].sort();
const changedFiles = [];

for (const file of uniqueFiles) {
    if (await fixFile(file)) {
        changedFiles.push(path.relative(process.cwd(), file));
    }
}

if (changedFiles.length) {
    console.log(`Removed duplicate import lines from ${changedFiles.length} file(s):`);
    changedFiles.forEach((file) => console.log(`- ${file}`));
} else {
    console.log('No duplicate import lines found.');
}
