import os
import glob

pages_dir = r"c:\laragon\www\FokusIn\frontend\src\pages"

def replace_glassmorphism():
    target1 = "bg-white/80 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-white/40"
    replacement1 = "bg-white/60 backdrop-blur-xl rounded-3xl p-7 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60"

    target2 = "bg-white/80 backdrop-blur-xl rounded-3xl p-6 md:p-10 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100"
    replacement2 = "bg-white/60 backdrop-blur-xl rounded-3xl p-6 md:p-10 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60"

    target3 = "bg-white/80 backdrop-blur-xl rounded-3xl p-6 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-100"
    replacement3 = "bg-white/60 backdrop-blur-xl rounded-3xl p-6 md:p-8 shadow-[0_10px_40px_rgba(15,23,42,0.06)] border border-slate-200/60"

    count = 0
    for filepath in glob.glob(os.path.join(pages_dir, "**/*.vue"), recursive=True):
        with open(filepath, 'r', encoding='utf-8') as f:
            content = f.read()

        new_content = content.replace(target1, replacement1)
        new_content = new_content.replace(target2, replacement2)
        new_content = new_content.replace(target3, replacement3)

        if new_content != content:
            with open(filepath, 'w', encoding='utf-8') as f:
                f.write(new_content)
            count += 1
            print(f"Updated: {filepath}")

    print(f"Total files updated: {count}")

if __name__ == '__main__':
    replace_glassmorphism()
