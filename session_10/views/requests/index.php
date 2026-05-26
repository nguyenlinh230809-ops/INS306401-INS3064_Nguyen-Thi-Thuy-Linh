<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>SupportLink | Dashboard</title>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.3); }
        .bg-mesh { background-image: radial-gradient(at 0% 0%, hsla(253,16%,7%,1) 0, transparent 50%), radial-gradient(at 50% 0%, hsla(225,39%,30%,1) 0, transparent 50%), radial-gradient(at 100% 0%, hsla(339,49%,30%,1) 0, transparent 50%); }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-900 min-h-screen">
    <div class="max-w-6xl mx-auto py-16 px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
            <div>
                <h1 class="text-5xl font-extrabold tracking-tighter text-slate-900 mb-2">
                    Support<span class="text-indigo-600">Link</span>
                </h1>
                <p class="text-slate-500 font-medium text-lg">Quản lý yêu cầu hỗ trợ hệ thống</p>
            </div>
            <a href="/INS3064/session_10/public/request/create" 
               class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-2xl font-bold shadow-[0_20px_50px_rgba(79,70,229,0.2)] transition-all hover:-translate-y-1 active:scale-95 flex items-center gap-2 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Tạo yêu cầu mới
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm">
                <p class="text-slate-400 text-sm font-bold uppercase tracking-wider mb-1">Tổng yêu cầu</p>
                <h4 class="text-3xl font-black"><?= count($tickets) ?></h4>
            </div>
        </div>

        <div class="grid gap-6">
            <?php foreach($tickets as $t): ?>
            <div class="group bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-[0_30px_60px_rgba(0,0,0,0.05)] transition-all duration-500">
                <div class="flex flex-col md:flex-row justify-between gap-6">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="bg-indigo-50 text-indigo-600 text-[10px] font-black px-3 py-1 rounded-full uppercase italic tracking-widest">
                                #<?= $t['id'] ?>
                            </span>
                            <h3 class="text-2xl font-bold text-slate-800 group-hover:text-indigo-600 transition-colors"><?= htmlspecialchars($t['title']) ?></h3>
                        </div>
                        <p class="text-slate-500 text-lg leading-relaxed mb-6"><?= htmlspecialchars($t['description']) ?></p>
                        
                        <div class="flex flex-wrap gap-4 items-center">
                            <div class="flex items-center gap-2 bg-slate-50 px-4 py-2 rounded-xl">
                                <div class="w-2.5 h-2.5 rounded-full <?= $t['priority'] == 'Cao' ? 'bg-red-500 animate-pulse' : ($t['priority'] == 'Trung bình' ? 'bg-amber-400' : 'bg-emerald-400') ?>"></div>
                                <span class="text-sm font-bold text-slate-600">Ưu tiên: <?= $t['priority'] ?></span>
                            </div>
                            <span class="px-4 py-2 rounded-xl text-sm font-bold bg-indigo-600 text-white"><?= $t['status'] ?></span>
                        </div>
                    </div>
                    <div class="flex flex-col justify-between items-end border-l border-slate-100 pl-8 hidden md:flex">
                        <span class="text-slate-400 font-semibold"><?= date('d M, Y', strtotime($t['created_at'])) ?></span>
                        <button class="text-slate-900 font-black text-sm uppercase tracking-widest border-b-2 border-indigo-600 pb-1 hover:text-indigo-600 transition-colors">
                            Xem chi tiết
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>