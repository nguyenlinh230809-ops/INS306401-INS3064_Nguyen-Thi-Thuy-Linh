<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }</style>
</head>
<body class="min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-md">
        <a href="index.php" class="text-slate-400 hover:text-slate-600 mb-6 inline-flex items-center text-sm transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            Quay lại danh sách
        </a>
        
        <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 p-8 border border-slate-100">
            <h2 class="text-2xl font-bold text-slate-800 mb-2">Thêm hàng mới</h2>
            <p class="text-slate-500 text-sm mb-8">Nhập thông tin sản phẩm để cập nhật vào hệ thống</p>
            
            <form method="POST" class="space-y-5">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tên sản phẩm</label>
                    <input type="text" name="name" required placeholder="Nhập tên..."
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Giá niêm yết (VNĐ)</label>
                    <input type="number" name="price" required placeholder="0"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Mô tả sản phẩm</label>
                    <textarea name="description" rows="4" placeholder="Thông tin chi tiết về sản phẩm..."
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none resize-none"></textarea>
                </div>
                
                <button type="submit" 
                    class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold py-4 rounded-xl shadow-lg transition-all active:scale-[0.98] mt-4">
                    Hoàn tất thêm mới
                </button>
            </form>
        </div>
    </div>
</body>
</html>