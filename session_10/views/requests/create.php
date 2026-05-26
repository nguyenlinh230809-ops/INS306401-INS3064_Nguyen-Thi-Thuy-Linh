<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <title>SupportLink | Tạo yêu cầu</title>
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#f8fafc] min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-xl bg-white rounded-[3rem] shadow-[0_40px_80px_rgba(0,0,0,0.07)] p-12 border border-slate-50">
        <header class="mb-10">
            <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight mb-3">Gửi yêu cầu</h2>
            <p class="text-slate-400 font-medium">Chúng tôi sẽ phản hồi bạn trong thời gian sớm nhất.</p>
        </header>

        <form action="#" method="POST" class="space-y-8">
            <div class="space-y-2">
                <label class="text-sm font-black text-slate-800 uppercase tracking-widest ml-1">Tiêu đề sự cố</label>
                <input type="text" name="title" required placeholder="Nhập tiêu đề..."
                    class="w-full px-6 py-5 rounded-[1.5rem] bg-slate-50 border-2 border-transparent focus:border-indigo-600 focus:bg-white transition-all outline-none text-lg font-medium text-slate-700">
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-sm font-black text-slate-800 uppercase tracking-widest ml-1">Mức độ</label>
                    <select name="priority" class="w-full px-6 py-5 rounded-[1.5rem] bg-slate-50 border-2 border-transparent focus:border-indigo-600 focus:bg-white transition-all outline-none text-lg font-medium text-slate-700 appearance-none">
                        <option>Thấp</option>
                        <option selected>Trung bình</option>
                        <option>Cao</option>
                    </select>
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-black text-slate-800 uppercase tracking-widest ml-1">Mô tả chi tiết</label>
                <textarea name="description" rows="5" placeholder="Bạn đang gặp vấn đề gì?"
                    class="w-full px-6 py-5 rounded-[1.5rem] bg-slate-50 border-2 border-transparent focus:border-indigo-600 focus:bg-white transition-all outline-none resize-none text-lg font-medium text-slate-700"></textarea>
            </div>

            <div class="flex items-center gap-4 pt-4">
                <a href="/INS3064/session_10/public/" class="flex-1 text-center py-5 rounded-2xl font-bold text-slate-400 hover:text-slate-600 transition-colors">Hủy bỏ</a>
                <button type="submit" class="flex-[2] bg-slate-900 hover:bg-black text-white font-bold py-5 rounded-2xl shadow-2xl transition-all active:scale-95">
                    Xác nhận gửi
                </button>
            </div>
        </form>
    </div>
</body>
</html>