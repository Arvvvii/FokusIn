import os
import re

target_dir = 'c:/laragon/www/FokusIn/frontend/src/pages'
target_h1_cls = 'text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight'
target_p_cls = 'text-[15px] text-slate-600 font-medium mt-2 max-w-xl leading-relaxed'

base_container_classes = [
    'bg-white/80',
    'backdrop-blur-xl',
    'rounded-3xl',
    'p-7',
    'md:p-8',
    'shadow-[0_10px_40px_rgba(15,23,42,0.06)]',
    'border',
    'border-white/40',
    'relative',
    'overflow-hidden'
]

def update_file(filepath):
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    original_content = content
    changed = False

    # 1. Update H1
    h1_match = re.search(r'<h1([^>]*)>(.*?)</h1>', content)
    if h1_match:
        old_h1_full = h1_match.group(0)
        h1_attrs = h1_match.group(1)
        h1_inner = h1_match.group(2)
        
        # We only want to update if it's likely a page header h1
        # Generally, it's the first h1 and has "text-2xl" or "text-3xl" or "text-[28px]" etc.
        new_h1_attrs = re.sub(r'class="[^"]*"', f'class="{target_h1_cls}"', h1_attrs)
        if 'class=' not in h1_attrs:
            new_h1_attrs = f' class="{target_h1_cls}"{h1_attrs}'
            
        new_h1_full = f'<h1{new_h1_attrs}>{h1_inner}</h1>'
        content = content.replace(old_h1_full, new_h1_full, 1)
        if content != original_content:
            changed = True

        # 2. Update P after H1
        h1_idx = content.find(new_h1_full)
        if h1_idx != -1:
            substr = content[h1_idx:h1_idx+1000]
            p_match = re.search(r'<p([^>]*)>(.*?)</p>', substr, flags=re.DOTALL)
            if p_match:
                p_attrs = p_match.group(1)
                p_inner = p_match.group(2)
                if 'text-slate' in p_attrs or 'text-gray' in p_attrs:
                    new_p_attrs = re.sub(r'class="[^"]*"', f'class="{target_p_cls}"', p_attrs)
                    new_p_full = f'<p{new_p_attrs}>{p_inner}</p>'
                    
                    content_before = content[:h1_idx]
                    content_after = content[h1_idx+1000:]
                    substr_new = substr.replace(p_match.group(0), new_p_full, 1)
                    content = content_before + substr_new + content_after
                    changed = True

    # 3. Update the Header Container Div
    # Find all divs before the H1
    divs = re.finditer(r'<div class="([^"]+)"[^>]*>', content)
    h1_idx = content.find('<h1')
    best_div = None
    for d in divs:
        if d.start() < h1_idx:
            cls = d.group(1)
            # A good heuristic for the header container is it usually has bg-white, rounded, border, p-5/6/7/8
            if 'bg-white' in cls and ('border' in cls or 'shadow' in cls or 'p-' in cls):
                best_div = d
    
    if best_div:
        old_div_full = best_div.group(0)
        old_cls = best_div.group(1)
        
        # Keep layout classes (margins, flex, grid, etc)
        keep_classes = []
        for c in old_cls.split():
            if c.startswith('mb-') or c.startswith('mt-') or c.startswith('flex') or c.startswith('justify-') or c.startswith('items-') or c.startswith('gap-') or c.startswith('sm:') or c.startswith('md:flex') or c.startswith('md:items') or c.startswith('lg:') or c.startswith('w-') or c.startswith('max-w-'):
                if c not in base_container_classes:
                    keep_classes.append(c)
        
        new_cls = ' '.join(base_container_classes + keep_classes)
        new_div_full = old_div_full.replace(old_cls, new_cls)
        content = content.replace(old_div_full, new_div_full, 1)
        changed = True

    if changed:
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f'Updated {filepath}')

for root, _, files in os.walk(target_dir):
    for file in files:
        if file.endswith('.vue'):
            update_file(os.path.join(root, file))
print('Done.')
