@extends('admin.layouts.master')

@section('title', 'Admin Knowledge Hub & Documentation')

@section('content')
<div class="mb-12">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div class="flex items-center space-x-6">
            <div class="w-20 h-20 bg-gradient-to-tr from-indigo-700 via-indigo-600 to-purple-600 rounded-[2.5rem] flex items-center justify-center shadow-2xl shadow-indigo-200">
                <i class="fas fa-university text-white text-4xl"></i>
            </div>
            <div>
                <h1 class="text-5xl font-black text-slate-900 tracking-tightest mb-2">Knowledge Hub</h1>
                <div class="flex items-center space-x-3">
                    <span class="px-3 py-1 bg-indigo-100 text-indigo-700 text-xs font-black uppercase tracking-widest rounded-full">v2.0 Official Manual</span>
                    <p class="text-slate-400 font-bold text-sm tracking-wide">EVERYTHING YOU NEED TO KNOW ABOUT MYAPIQO PANEL</p>
                </div>
            </div>
        </div>
        <div class="hidden xl:flex items-center space-x-4">
            <div class="text-right">
                <p class="text-slate-400 text-xs font-bold uppercase tracking-widest mb-1">System Status</p>
                <div class="flex items-center space-x-2">
                    <div class="w-3 h-3 bg-emerald-500 rounded-full animate-pulse"></div>
                    <p class="text-slate-900 font-black">All Modules Active</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-5 gap-12">
    <!-- MASTER NAVIGATION -->
    <div class="xl:col-span-1">
        <div class="sticky top-10 space-y-8">
            <div class="bg-white rounded-[3rem] shadow-2xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                <div class="p-8">
                    <h3 class="text-[0.6rem] font-black text-indigo-400 uppercase tracking-[0.3em] mb-8 flex items-center">
                        <i class="fas fa-compass mr-3"></i> Exploration
                    </h3>
                    <nav class="space-y-1">
                        @foreach([
                            ['id' => 'dashboard', 'title' => 'Dashboard', 'icon' => 'fa-th-large'],
                            ['id' => 'products', 'title' => 'Products', 'icon' => 'fa-box-open'],
                            ['id' => 'categories', 'title' => 'Categories', 'icon' => 'fa-tags'],
                            ['id' => 'brands', 'title' => 'Brands', 'icon' => 'fa-trademark'],
                            ['id' => 'orders', 'title' => 'Orders', 'icon' => 'fa-shopping-cart'],
                            ['id' => 'offers', 'title' => 'Offers & Coupons', 'icon' => 'fa-percentage'],
                            ['id' => 'customers', 'title' => 'Customers', 'icon' => 'fa-user-friends'],
                            ['id' => 'media', 'title' => 'Media Manager', 'icon' => 'fa-images'],
                            ['id' => 'crm', 'title' => 'CRM & Sliders', 'icon' => 'fa-bullhorn'],
                            ['id' => 'pages', 'title' => 'Static Pages', 'icon' => 'fa-file-alt'],
                            ['id' => 'taxes', 'title' => 'Taxes', 'icon' => 'fa-percent'],
                            ['id' => 'social', 'title' => 'Reviews & Feedback', 'icon' => 'fa-star'],
                            ['id' => 'settings', 'title' => 'Global Settings', 'icon' => 'fa-cog']
                        ] as $nav)
                        <a href="#{{ $nav['id'] }}" class="group flex items-center space-x-4 p-3.5 rounded-2xl hover:bg-slate-50 text-slate-500 hover:text-indigo-600 transition-all duration-300">
                            <div class="w-8 h-8 flex items-center justify-center rounded-xl bg-slate-50 group-hover:bg-indigo-100 group-hover:text-indigo-600 transition-colors">
                                <i class="fas {{ $nav['icon'] }} text-xs"></i>
                            </div>
                            <span class="font-bold text-sm tracking-tight">{{ $nav['title'] }}</span>
                        </a>
                        @endforeach
                    </nav>
                </div>
            </div>

            <div class="bg-slate-900 rounded-[3rem] p-10 text-white relative overflow-hidden shadow-2xl group">
                <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-indigo-500/20 rounded-full blur-3xl group-hover:bg-indigo-500/40 transition-all duration-700"></div>
                <h4 class="font-black text-2xl mb-4 relative z-10">Instant Help</h4>
                <p class="text-slate-400 mb-8 font-medium leading-relaxed relative z-10">We coded this project to be intuitive, but if you're stuck, our lead dev is 1 click away.</p>
                <a href="mailto:support@example.com" class="flex items-center justify-center w-full bg-white text-indigo-600 font-black py-4 rounded-2xl transition-all shadow-xl hover:shadow-indigo-500/30 hover:bg-indigo-50">
                    Email Team
                </a>
            </div>
        </div>
    </div>

    <!-- DOCUMENTATION CONTENT -->
    <div class="xl:col-span-4 space-y-24 pb-32">
        
        <!-- DASHBOARD -->
        <section id="dashboard" class="scroll-mt-12 group">
            <div class="bg-white rounded-[4rem] shadow-2xl shadow-slate-100 border border-slate-100 overflow-hidden">
                <div class="h-4 bg-gradient-to-r from-blue-400 via-indigo-500 to-purple-500"></div>
                <div class="p-16">
                    <div class="flex items-center space-x-6 mb-12">
                        <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-[2rem] flex items-center justify-center font-black text-2xl shadow-inner shadow-blue-100 italic">01</div>
                        <div>
                            <h3 class="text-4xl font-black text-slate-900 tracking-tighter">Dashboard Analytics</h3>
                            <p class="text-slate-400 font-bold uppercase text-xs tracking-widest mt-1">Real-time Performance monitoring</p>
                        </div>
                    </div>
                    
                    <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed font-medium">
                        <p class="mb-10 text-lg">The Dashboard is your vertical overview of the entire business ecosystem. It aggregates data from orders, customers, and inventory into readable metrics.</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="p-8 bg-slate-50 rounded-[2.5rem] border border-slate-100">
                                <h4 class="text-slate-900 font-black mb-4 flex items-center">
                                    <i class="fas fa-chart-line mr-3 text-blue-500"></i> Active Statistics
                                </h4>
                                <p class="text-sm">Revenue, Total Orders, and Customer counts are calculated dynamically. The <strong>Percentage Change</strong> shows how your current month compares to the previous one.</p>
                            </div>
                            <div class="p-8 bg-slate-50 rounded-[2.5rem] border border-slate-100">
                                <h4 class="text-slate-900 font-black mb-4 flex items-center">
                                    <i class="fas fa-exclamation-triangle mr-3 text-amber-500"></i> Critical Alerts
                                </h4>
                                <p class="text-sm italic">"Low Stock" and "Out of Stock" alerts are automated triggers. If a product variant falls below 10 units, it appears here for immediate reordering.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ & TROUBLESHOOTING -->
        <section id="faq" class="scroll-mt-12 group">
            <div class="bg-white rounded-[4rem] shadow-2xl shadow-slate-100 border border-slate-100 overflow-hidden">
                <div class="h-4 bg-gradient-to-r from-slate-400 via-slate-500 to-slate-600"></div>
                <div class="p-16">
                    <div class="flex items-center space-x-6 mb-12">
                        <div class="w-16 h-16 bg-slate-50 text-slate-700 rounded-[2rem] flex items-center justify-center font-black text-2xl shadow-inner shadow-slate-100 italic">FAQ</div>
                        <div>
                            <h3 class="text-4xl font-black text-slate-900 tracking-tighter">Frequently Asked Questions</h3>
                            <p class="text-slate-400 font-bold uppercase text-xs tracking-widest mt-1">Clear answers to the most common admin questions</p>
                        </div>
                    </div>

                    <div class="prose prose-slate max-w-none text-slate-600">
                        <h4>General — Where to start?</h4>
                        <p><strong>Answer:</strong> Use the left sidebar to access Dashboard → Products → Orders → Settings. Start with adding one product and publishing it as a test.</p>

                        <h4>How do I add a new product?</h4>
                        <p><strong>Answer:</strong> Go to <em>Products → Add Product</em>. Fill required fields: <strong>Name, SKU, Price, Category, Status</strong>. Upload at least one image, set inventory quantity, and click <strong>Save</strong> or <strong>Publish</strong>. See the top of this help page for a step-by-step workflow.</p>

                        <h4>What are Attributes and Specifications — what's the difference?</h4>
                        <p><strong>Answer:</strong> Attributes create selectable options for customers (e.g., Size, Color) and are used to build variants. Specifications are informational key/value pairs (e.g., Weight: 200g) shown in the product details tab.</p>

                        <h4>How do I create variants?</h4>
                        <p><strong>Answer:</strong> On product edit, add Attributes and their values then use the Generate Variants control. Edit each variant for SKU, price override, image, and stock.</p>

                        <h4>Product images not showing on storefront — why?</h4>
                        <p><strong>Answer:</strong> Ensure files saved under <code>storage/app/public</code> and run the storage link once: <code>php artisan storage:link</code>. Also clear any caching (view/cache) if images were recently uploaded.</p>

                        <h4>Stock doesn't reduce after an order — what should I check?</h4>
                        <p><strong>Answer:</strong> Confirm the order processing job ran successfully. If your app uses queues, ensure workers are running (e.g., <code>php artisan queue:work</code>). Check event listeners that decrement inventory.</p>

                        <h4>How do I process refunds?</h4>
                        <p><strong>Answer:</strong> Open the order, select <strong>Refund</strong>, enter the amount and reason, and confirm. For gateway refunds (e.g., Razorpay), also check the payment provider dashboard and reconcile transaction IDs.</p>

                        <h4>How to schedule a promotion?</h4>
                        <p><strong>Answer:</strong> Offers → Create Offer → set discount type and date range → assign products/categories → save. Test by adding a qualified product to cart and applying the code (if coupon-based).</p>

                        <h4>How to change tax or shipping rules?</h4>
                        <p><strong>Answer:</strong> Settings → Taxes for tax classes and rates; Settings → Shipping for methods and zones. After changes, place a test order to confirm calculations.</p>

                        <h4>How to give another staff member access?</h4>
                        <p><strong>Answer:</strong> Users → Add User → assign role/permissions. Roles control which sections are visible. Never share a single account; create one per staff member for audit trails.</p>

                        <h4>How to bulk-edit products (prices, status)?</h4>
                        <p><strong>Answer:</strong> Products list → select multiple checkboxes → use Bulk Actions (Status, Price Update, Export). For advanced mass edits, export CSV, edit in spreadsheet, and import back.</p>

                        <h4>What to do if the admin panel loads slowly?</h4>
                        <p><strong>Answer:</strong> Check server resources (CPU, memory), optimize DB (indexes), clear view cache (<code>php artisan view:clear</code>), and disable non-essential dev tools on production. Also compress images and use CDN for static assets.</p>

                        <h4>How to revert a mistaken product change?</h4>
                        <p><strong>Answer:</strong> If you use versioned backups, restore latest backup for that table. Otherwise, keep change logs: use the Activity Log (if enabled) for details and manually revert fields. Best practice: use Draft mode for edits, preview, then publish.</p>

                        <h4>How to capture customer complaints or flag suspicious users?</h4>
                        <p><strong>Answer:</strong> Open the customer record, review order history and IP address (if recorded). Use the <strong>Block</strong> action to prevent future orders and add notes to the profile. Escalate to security team with evidence.</p>

                        <h4>How to make a printable invoice?</h4>
                        <p><strong>Answer:</strong> Open order → Print Invoice. The system generates a PDF formatted for printing containing the store address, invoice items, taxes and order totals.</p>

                        <h4>How to export orders or products?</h4>
                        <p><strong>Answer:</strong> Use Export buttons (CSV/Excel) on Orders or Products listing pages. For complex exports, use the Reports section and custom filters, then export the dataset.</p>

                        <h4>How to add a new page (About, Terms)?</h4>
                        <p><strong>Answer:</strong> Pages → Create Page → add Title, Slug, Content (WYSIWYG), and SEO meta → Save → View on storefront to confirm layout.</p>

                        <h4>How to test payment gateways safely?</h4>
                        <p><strong>Answer:</strong> Use the gateway's Sandbox/Test mode and use the test API keys in Settings. Never use live keys while testing. After testing, swap to live keys and perform a low-value transaction to confirm.</p>

                        <h4>Common error messages and quick fixes</h4>
                        <ul>
                            <li><strong>Validation error: The name field is required.</strong> — Fill the Name field and retry.</li>
                            <li><strong>419 Page Expired.</strong> — Refresh page and re-submit; ensure sessions are active and CSRF token is present.</li>
                            <li><strong>Permission denied.</strong> — Make sure your user role includes required permissions or ask an admin to grant access.</li>
                            <li><strong>File upload failed.</strong> — Check storage disk space and file size limits; verify <code>storage:link</code> exists.</li>
                        </ul>

                        <h4>If nothing works — what to include when contacting support</h4>
                        <p>Please include:</p>
                        <ol>
                            <li>Admin user email and role</li>
                            <li>Exact page URL and steps to reproduce</li>
                            <li>Screenshots and browser console errors (F12 → Console)</li>
                            <li>Time and timezone of the incident</li>
                            <li>Any recent changes made in Settings or system updates</li>
                        </ol>

                        <h4>How to make a quick screencast or screenshot?</h4>
                        <p><strong>Windows:</strong> Use the Snipping Tool or <code>Win+Shift+S</code> for screenshots. For screencasts, use Xbox Game Bar <code>Win+G</code> or a quick tool like Loom.</p>

                        <h4>Where developers should look (quick links)</h4>
                        <p>Product views: <code>resources/views/admin/products/create.blade.php</code>, <code>resources/views/admin/products/edit.blade.php</code>, <code>resources/views/admin/products/index.blade.php</code>.</p>
                        <p>Orders: <code>resources/views/admin/orders/index.blade.php</code>. Settings: <code>resources/views/admin/settings/index.blade.php</code>. Dashboard: <code>resources/views/admin/dashboard/index.blade.php</code>.</p>

                        <h4>Final advice — how to avoid common mistakes</h4>
                        <ul>
                            <li>Always preview changes in Staging first.</li>
                            <li>Use Draft mode for major product edits.</li>
                            <li>Keep SKUs consistent and documented.</li>
                            <li>Train new staff with this Help page and a short onboarding checklist.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- PRODUCTS -->
        <section id="products" class="scroll-mt-12 group">
            <div class="bg-white rounded-[4rem] shadow-2xl shadow-slate-100 border border-slate-100 overflow-hidden">
                <div class="h-4 bg-gradient-to-r from-emerald-400 to-teal-500"></div>
                <div class="p-16">
                    <div class="flex items-center space-x-6 mb-12">
                        <div class="w-16 h-16 bg-emerald-50 text-emerald-600 rounded-[2rem] flex items-center justify-center font-black text-2xl shadow-inner shadow-emerald-100 italic">02</div>
                        <div>
                            <h3 class="text-4xl font-black text-slate-900 tracking-tighter">Product Management</h3>
                            <p class="text-slate-400 font-bold uppercase text-xs tracking-widest mt-1">Mastering your inventory & variants</p>
                        </div>
                    </div>
                    
                    <div class="space-y-12">
                        <div class="bg-emerald-50/30 p-10 rounded-[3rem] border border-emerald-100">
                            <h4 class="text-xl font-black text-slate-900 mb-6">Workflow: Creating a Perfect Product</h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                                <div class="space-y-3">
                                    <span class="w-8 h-8 bg-emerald-500 text-white rounded-xl flex items-center justify-center font-black text-xs">1</span>
                                    <p class="font-black text-slate-700">General Info</p>
                                    <p class="text-xs text-slate-500">Name, Description, and Category selection. Use bold titles for better UI.</p>
                                </div>
                                <div class="space-y-3">
                                    <span class="w-8 h-8 bg-emerald-500 text-white rounded-xl flex items-center justify-center font-black text-xs">2</span>
                                    <p class="font-black text-slate-700">Variants & Pricing</p>
                                    <p class="text-xs text-slate-500">Add Sizes, Colors, or Styles. Each variant can have its own Price and Stock count.</p>
                                </div>
                                <div class="space-y-3">
                                    <span class="w-8 h-8 bg-emerald-500 text-white rounded-xl flex items-center justify-center font-black text-xs">3</span>
                                    <p class="font-black text-slate-700">SEO & Media</p>
                                    <p class="text-xs text-slate-500">Pick images from Media Library. Add Tags for internal search filtering.</p>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="p-8 border border-slate-100 rounded-[2.5rem] bg-white">
                                <h5 class="font-black text-slate-900 mb-3 flex items-center">
                                    <i class="fas fa-cog mr-3 text-slate-400"></i> Attributes & Specs
                                </h5>
                                <p class="text-xs text-slate-500 leading-relaxed font-semibold">Use <strong>Attributes</strong> for options the user can CHOOSE (like Color). Use <strong>Specifications</strong> for facts (like Weight or Dimensions).</p>
                            </div>
                            <div class="p-8 border border-slate-100 rounded-[2.5rem] bg-white">
                                <h5 class="font-black text-slate-900 mb-3 flex items-center">
                                    <i class="fas fa-search mr-3 text-slate-400"></i> Search by Code
                                </h5>
                                <p class="text-xs text-slate-500 leading-relaxed font-semibold">Our system allows searching products not just by Name, but by their internal <strong>Product Code</strong> (SKU) for faster inventory checks.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CATEGORIES & BRANDS -->
        <section id="categories" class="scroll-mt-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="bg-white rounded-[3.5rem] p-12 border border-slate-100 shadow-xl shadow-slate-50">
                    <div class="flex items-center space-x-4 mb-8">
                        <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-sitemap"></i>
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 tracking-tight">Parent-Child Categories</h3>
                    </div>
                    <p class="text-slate-500 font-medium text-sm leading-relaxed mb-6">Organize your store by creating Parent categories (e.g., Electronics) and sub-categories (e.g., Laptops). This automatically builds the navigation tree for your customers.</p>
                    <div class="bg-indigo-50/50 p-4 rounded-2xl border border-indigo-100 text-xs font-bold text-indigo-700 italic">
                        "Products must be linked to the lowest level sub-category for better filtering."
                    </div>
                </div>

                <div class="bg-white rounded-[3.5rem] p-12 border border-slate-100 shadow-xl shadow-slate-50">
                    <div class="flex items-center space-x-4 mb-8">
                        <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-award"></i>
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 tracking-tight">Brand Authority</h3>
                    </div>
                    <p class="text-slate-500 font-medium text-sm leading-relaxed mb-6">Create brands and link them to products. This allows customers to shop by their favorite brands. Every brand can have its own logo and a dedicated page on the frontend.</p>
                    <div class="bg-purple-50/50 p-4 rounded-2xl border border-purple-100 text-xs font-bold text-purple-700 italic">
                        "High-resolution logos are recommended for premium brand appearance."
                    </div>
                </div>
            </div>
        </section>

        <!-- ORDERS -->
        <section id="orders" class="scroll-mt-12 group">
            <div class="bg-white rounded-[4rem] shadow-2xl shadow-slate-100 border border-slate-100 overflow-hidden">
                <div class="h-4 bg-gradient-to-r from-orange-500 to-red-600"></div>
                <div class="p-16">
                    <div class="flex items-center space-x-6 mb-12">
                        <div class="w-16 h-16 bg-orange-50 text-orange-600 rounded-[2rem] flex items-center justify-center font-black text-2xl shadow-inner shadow-orange-100 italic">03</div>
                        <div>
                            <h3 class="text-4xl font-black text-slate-900 tracking-tighter">Order Lifecycle</h3>
                            <p class="text-slate-400 font-bold uppercase text-xs tracking-widest mt-1">From Checkout to Delivery</p>
                        </div>
                    </div>
                    
                    <div class="prose prose-slate max-w-none mb-12">
                        <div class="flex flex-col md:flex-row items-center justify-between bg-slate-50 p-8 rounded-[3rem] border border-slate-100">
                            <div class="text-center md:text-left mb-6 md:mb-0">
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-[10px] font-black uppercase mb-2 inline-block tracking-tighter">Start</span>
                                <p class="font-black text-slate-900">1. Pending Review</p>
                                <p class="text-[10px] text-slate-400 font-bold uppercase">Payment Confirmation</p>
                            </div>
                            <div class="hidden md:block text-slate-200"><i class="fas fa-chevron-right"></i></div>
                            <div class="text-center md:text-left mb-6 md:mb-0">
                                <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-[10px] font-black uppercase mb-2 inline-block tracking-tighter">Processing</span>
                                <p class="font-black text-slate-900">2. Packaging</p>
                                <p class="text-[10px] text-slate-400 font-bold uppercase">Generate Invoice</p>
                            </div>
                            <div class="hidden md:block text-slate-200"><i class="fas fa-chevron-right"></i></div>
                            <div class="text-center md:text-left">
                                <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-[10px] font-black uppercase mb-2 inline-block tracking-tighter">Final</span>
                                <p class="font-black text-slate-900">3. Shipped / Done</p>
                                <p class="text-[10px] text-slate-400 font-bold uppercase">Add Tracking ID</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="p-8 bg-slate-900 rounded-[3rem] text-white">
                            <h5 class="font-black text-lg mb-4 flex items-center">
                                <i class="fas fa-file-invoice mr-3 text-indigo-400"></i> Invoice Management
                            </h5>
                            <p class="text-slate-400 text-xs font-semibold leading-relaxed mb-6">Clicking <strong>"Print Invoice"</strong> generates a tax-compliant PDF with your store logo and address. You should stick this on the shipping box.</p>
                            <div class="flex items-center text-[10px] font-black tracking-widest text-indigo-400 uppercase">
                                <i class="fas fa-info-circle mr-2"></i> Auto-Calculates GST & Shipping
                            </div>
                        </div>
                        <div class="p-8 bg-white border-2 border-slate-100 rounded-[3rem]">
                            <h5 class="font-black text-slate-900 mb-4 flex items-center">
                                <i class="fas fa-truck mr-3 text-orange-500"></i> Tracking & Updates
                            </h5>
                            <p class="text-slate-500 text-xs font-semibold leading-relaxed">Once handed to the courier, update the <strong>Tracking Number</strong>. This allows the customer to track their shipment from their "My Account" area.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- OFFERS, TAXES, CUSTOMERS (GRID) -->
        <section id="offers">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Offers -->
                <div class="bg-white rounded-[3rem] p-10 border border-slate-100 shadow-xl shadow-slate-100/50">
                    <h4 class="font-black text-slate-900 mb-6 flex items-center">
                        <i class="fas fa-gift mr-3 text-pink-500"></i> Offers & Coupons
                    </h4>
                    <p class="text-slate-400 text-xs font-bold leading-relaxed mb-6">Create Percentage or Fixed Discounts. Use <strong>Usage Limits</strong> to control how many times a coupon can be used site-wide.</p>
                </div>
                <!-- Taxes -->
                <div class="bg-white rounded-[3rem] p-10 border border-slate-100 shadow-xl shadow-slate-100/50">
                    <h4 class="font-black text-slate-900 mb-6 flex items-center">
                        <i class="fas fa-percentage mr-3 text-emerald-500"></i> Tax Configuration
                    </h4>
                    <p class="text-slate-400 text-xs font-bold leading-relaxed mb-6">Setup GST rates globally. These percentages are automatically added to every checkout unless marked as tax-exempt.</p>
                </div>
                <!-- Customers -->
                <div class="bg-white rounded-[3rem] p-10 border border-slate-100 shadow-xl shadow-slate-100/50">
                    <h4 class="font-black text-slate-900 mb-6 flex items-center">
                        <i class="fas fa-users mr-3 text-blue-500"></i> Customer CRM
                    </h4>
                    <p class="text-slate-400 text-xs font-bold leading-relaxed mb-6">View user profiles, their total spent, and order history. You can <strong>Block</strong> suspicious users from ordering again.</p>
                </div>
            </div>
        </section>

        <!-- MEDIA & CRM -->
        <section id="media" class="scroll-mt-12 group">
            <div class="bg-slate-900 rounded-[4rem] p-16 text-white relative overflow-hidden shadow-2xl">
                <div class="absolute right-0 bottom-0 w-64 h-64 bg-indigo-600/10 blur-[100px] -mr-32 -mb-32"></div>
                <div class="relative z-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                        <div>
                            <h3 class="text-3xl font-black mb-8 flex items-center italic">
                                <i class="fas fa-photo-video mr-4 text-indigo-400"></i> The Media Vault
                            </h3>
                            <p class="text-slate-400 font-bold text-sm leading-relaxed mb-8">Stop uploading the same logo 10 times. Our system saves images once. Use the <strong>Media Manager</strong> to pick images for products, categories, or banners from your central storage.</p>
                            <div class="flex items-center space-x-6">
                                <div class="bg-white/5 px-4 py-3 rounded-2xl border border-white/10 text-center">
                                    <p class="text-indigo-400 font-black text-lg">1920x800</p>
                                    <p class="text-[8px] font-black uppercase text-slate-500 tracking-tighter">Ideal Banner Size</p>
                                </div>
                                <div class="bg-white/5 px-4 py-3 rounded-2xl border border-white/10 text-center">
                                    <p class="text-indigo-400 font-black text-lg">800x800</p>
                                    <p class="text-[8px] font-black uppercase text-slate-500 tracking-tighter">Ideal Product Square</p>
                                </div>
                            </div>
                        </div>

                        <div id="crm">
                            <h3 class="text-3xl font-black mb-8 flex items-center italic">
                                <i class="fas fa-bullseye mr-4 text-pink-400"></i> Visual Marketing
                            </h3>
                            <div class="space-y-6">
                                <div class="flex items-start space-x-4">
                                    <div class="w-10 h-10 bg-pink-500/20 text-pink-400 rounded-xl flex items-center justify-center shrink-0">
                                        <i class="fas fa-layer-group"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-black text-sm">Home Sectioning</h5>
                                        <p class="text-xs text-slate-500 font-semibold mb-1">Change the order of homepage rows. "New Arrivals" first or "Best Sellers"? You Decide.</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-4">
                                    <div class="w-10 h-10 bg-indigo-500/20 text-indigo-400 rounded-xl flex items-center justify-center shrink-0">
                                        <i class="fas fa-images"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-black text-sm">Banner Sliders</h5>
                                        <p class="text-xs text-slate-500 font-semibold mb-1">Upload giant banners with overlay text and buttons. Link them directly to product categories.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CMS: PAGES, REVIEWS, TESTIMONIALS -->
        <section id="pages" class="scroll-mt-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Pages -->
                <div class="bg-white rounded-[3rem] p-10 border border-slate-100 shadow-xl shadow-slate-100/50">
                    <h4 class="font-black text-slate-900 mb-6 flex items-center uppercase text-xs tracking-widest">
                        <i class="fas fa-file-invoice mr-3 text-slate-400"></i> Corporate Pages
                    </h4>
                    <p class="text-slate-500 text-xs font-medium leading-relaxed">Update your **About Us**, **Terms**, and **Privacy** policies without needing a developer.</p>
                </div>
                <!-- Reviews -->
                <div id="social" class="bg-white rounded-[3rem] p-10 border border-slate-100 shadow-xl shadow-slate-100/50">
                    <h4 class="font-black text-slate-900 mb-6 flex items-center uppercase text-xs tracking-widest">
                        <i class="fas fa-star mr-3 text-amber-400"></i> Customer Reviews
                    </h4>
                    <p class="text-slate-500 text-xs font-medium leading-relaxed">Moderate all product reviews. You can Approve, Reject, or Delete any comment before it goes live.</p>
                </div>
                <!-- Testimonials -->
                <div class="bg-white rounded-[3rem] p-10 border border-slate-100 shadow-xl shadow-slate-100/50">
                    <h4 class="font-black text-slate-900 mb-6 flex items-center uppercase text-xs tracking-widest">
                        <i class="fas fa-quote-left mr-3 text-indigo-400"></i> Success Stories
                    </h4>
                    <p class="text-slate-500 text-xs font-medium leading-relaxed">Add client testimonials manually to build social proof on your home page.</p>
                </div>
            </div>
        </section>

        <!-- SETTINGS -->
        <section id="settings" class="scroll-mt-12 group">
            <div class="bg-gradient-to-br from-indigo-50 to-slate-100 rounded-[4rem] p-16 border border-indigo-100 shadow-inner relative overflow-hidden">
                <div class="absolute right-0 top-0 p-10">
                    <i class="fas fa-shield-alt text-indigo-100 text-9xl"></i>
                </div>
                <div class="relative z-10 max-w-2xl">
                    <h3 class="text-4xl font-black text-slate-900 tracking-tighter mb-8">Master Configuration</h3>
                    <div class="space-y-6">
                        <div class="bg-white p-6 rounded-[2rem] border border-indigo-100 flex items-center space-x-6">
                            <div class="w-12 h-12 bg-indigo-600 text-white rounded-2xl flex items-center justify-center shrink-0 shadow-lg shadow-indigo-200">
                                <i class="fas fa-store"></i>
                            </div>
                            <div>
                                <h5 class="font-black text-slate-900">Store Identity</h5>
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-widest mt-0.5">Name, Email, Phone, Address</p>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-[2rem] border border-indigo-100 flex items-center space-x-6">
                            <div class="w-12 h-12 bg-white text-indigo-600 border border-indigo-100 rounded-2xl flex items-center justify-center shrink-0 shadow-sm">
                                <i class="fas fa-at"></i>
                            </div>
                            <div>
                                <h5 class="font-black text-slate-900">SEO Meta Mastery</h5>
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-widest mt-0.5">Global Titles & Meta Descriptions</p>
                            </div>
                        </div>
                        <div class="bg-indigo-600 p-8 rounded-[2rem] text-white shadow-xl shadow-indigo-200 mt-10">
                            <h5 class="font-black text-xl mb-3"><i class="fas fa-key mr-3"></i>Security Protocol</h5>
                            <p class="text-indigo-100 text-sm font-medium leading-relaxed">Change your login password at least once every 3 months in the <strong>Profile Settings</strong>. Use letters, numbers, and symbols.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

<style>
    @font-face {
        font-family: 'Inter';
        src: url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
    }
    body {
        font-family: 'Inter', sans-serif;
    }
    html {
        scroll-behavior: smooth;
    }
    section {
        transition: all 0.6s cubic-bezier(0.19, 1, 0.22, 1);
    }
    .tracking-tightest {
        letter-spacing: -0.05em;
    }
</style>
@endsection
