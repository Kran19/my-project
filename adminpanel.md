# Admin Panel — Complete User Guide

This document explains how to use every area of the admin panel for store administrators and power users. It describes common workflows (add/edit product, manage orders, handle inventory), key concepts (attributes, specifications, variants), and points developers to the main view files.

---

## Quick Navigation
- Open Admin Panel: login via your admin URL and credentials.
- Main sections (left sidebar): Dashboard, Products, Orders, Categories, Inventory, Users, Offers, Reports, Settings, Media, Pages, CRM, Notifications, Shipping, Taxes, Reviews, Testimonials, Brands.

---

## 1. Authentication & Access
- Login: use your admin credentials.
- Roles: admin/staff accounts have varying permissions (managed in the `Users` area).
- Security tips: use strong passwords, enable 2FA if provided, limit registration.

---

## 2. Dashboard
Purpose: real-time overview of orders, revenue, customers, and key alerts.
- Widgets: Today's Orders, Today's Revenue, Top Products, Recent Orders, Inventory Warnings.
- Use it to prioritize daily tasks: fulfill pending orders, restock low inventory, review promotions.
- Developer view: [resources/views/admin/dashboard/index.blade.php](resources/views/admin/dashboard/index.blade.php)

---

## 3. Products — Add, Edit, Manage
This is the core of the catalog. Typical workflows are "Add Product" and "Edit Product".

### Add Product (step-by-step)
1. Admin → Products → Add Product.
2. Fill required fields:
   - **Name**: product title (required).
   - **SKU**: unique identifier for inventory tracking.
   - **Price**: regular price and optional sale price.
   - **Categories**: select one or more categories for navigation.
   - **Status**: set to `Active` to publish or `Draft` to save for later.
3. Inventory:
   - **Stock Quantity**: number of units available.
   - **Allow Backorders**: if enabled, customers can order when stock is 0.
   - **Low-stock Threshold**: triggers alerts.
4. Images & Media:
   - Upload a **Main Image** and additional gallery images.
   - Recommended: keep consistent aspect ratios and optimize for web.
5. Attributes & Variants (optional): see Attributes section below.
6. Specifications (optional): technical key/value info for product detail page.
7. Shipping: weight, dimensions, shipping class.
8. SEO: slug, meta title, meta description, tags.
9. Save: click `Save` or `Publish`.

Developer files:
- Create form: [resources/views/admin/products/create.blade.php](resources/views/admin/products/create.blade.php)
- Product list: [resources/views/admin/products/index.blade.php](resources/views/admin/products/index.blade.php)

### Edit Product
- Admin → Products → search by name or SKU → click `Edit`.
- Update any field: price, images, categories, inventory, attributes, or specs.
- For variant products, editing the main product often shows a `Variants` section where you edit per-variant SKU, price, and stock.
- Save and verify on storefront.
- Developer file: [resources/views/admin/products/edit.blade.php](resources/views/admin/products/edit.blade.php)

### Best practices
- Always set SKU for each variant.
- Use drafts for multi-step product creation.
- Optimize images for performance.
- Test at least one product live after publishing.

---

## 4. Attributes vs Specifications (clear definitions)
- **Attributes**
  - Purpose: options customers choose that affect variant creation (e.g., `Size`, `Color`).
  - Implementation: attributes have multiple **values** (e.g., `Size` → `S, M, L`). When combined, they produce product variants.
  - Use-case: customer selects `Color` and `Size` on product page.
  - Inventory: tracked per variant (each variant has its own SKU & stock).

- **Specifications**
  - Purpose: informational technical details (e.g., `Battery life: 10 hours`).
  - Display: shown on the product details page as a specs table.
  - Not selectable; used for SEO and to help customers decide.

---

## 5. Variants (managing attribute combinations)
- Create attributes first (Size / Color) and assign them to a product.
- Generate variants: each variant can have its own SKU, price override, image, and stock quantity.
- When a customer purchases, the variant stock is decremented.

---

## 6. Inventory Management
- Admin → Inventory to view stock levels and transfer items if multiple warehouses are configured.
- Common actions:
  - Adjust stock quantities.
  - Record inventory receipts (incoming stock) and reductions (damaged/lost).
  - Set reorder thresholds to get low-stock alerts.
- If orders do not decrement stock, check the order processing queue or inventory service.

Developer file: [resources/views/admin/inventory/index.blade.php](resources/views/admin/inventory/index.blade.php)

---

## 7. Orders
Workflow: Customer orders → Order appears in Admin → Admin updates status → Customer notified.
- Order list: use search, filters (status, payment), and bulk actions (export, status updates).
- Order details show items, customer info, payment, and shipping address.
- Status flow (typical): `Pending` → `Confirmed` → `Processing` → `Shipped` → `Delivered`.
- Payments: view payment status (Paid, Pending, Failed, Refunded) and process refunds or partial payments.
- Actions: print invoice, send notifications, export to CSV/Excel.

Developer file: [resources/views/admin/orders/index.blade.php](resources/views/admin/orders/index.blade.php)

---

## 8. Categories
- Use categories to organize the catalog.
- Create parent and child categories, assign products to multiple categories.
- Tips: keep category names short and SEO-friendly.

Developer file: [resources/views/admin/categories/index.blade.php](resources/views/admin/categories/index.blade.php)

---

## 9. Users & Customers
- Admin users: manage staff accounts, roles, and permissions.
- Customers: view, edit customer profiles, segments, and order history.
- CRM: communicate with customers, assign segments (VIP, wholesale).

Developer files: [resources/views/admin/users/index.blade.php](resources/views/admin/users/index.blade.php)

---

## 10. Offers & Promotions
- Create discount rules (percentage, fixed amount, BOGO), set validity windows, and restrict by product/category.
- Track usage and redemption limits.

Developer file: [resources/views/admin/offers/index.blade.php](resources/views/admin/offers/index.blade.php)

---

## 11. Reports & Analytics
- Standard reports: Sales, Customers, Product performance, Inventory turnover.
- Exportable formats: CSV/Excel for external analysis.

Developer file: [resources/views/admin/reports/index.blade.php](resources/views/admin/reports/index.blade.php)

---

## 12. Brands
- Add brand names and logos; link products to brands.
- Useful for brand-pages and filtering.

Developer file: [resources/views/admin/brands/index.blade.php](resources/views/admin/brands/index.blade.php)

---

## 13. Media Library
- Upload, organize, and reuse images and files.
- Recommended: keep a folder structure and optimized images.

Developer file: [resources/views/admin/media/index.blade.php](resources/views/admin/media/index.blade.php)

---

## 14. Notifications & Email Templates
- Edit notification templates for order confirmations, shipping updates, and marketing emails.
- Test templates by sending sample emails.

Developer file: [resources/views/admin/notifications/index.blade.php](resources/views/admin/notifications/index.blade.php)

---

## 15. CRM, Banners & Home Sections
- Create banners, homepage sections, and popups to promote offers.
- Schedule visibility dates and target customer segments.

# Admin Panel — Complete Reference Guide

This document is a comprehensive, step-by-step reference that explains every sidebar item and all common admin tasks so your team can operate the store without needing repeated support.

If anything below is unclear, follow the "Self-help & troubleshooting" section at the end before contacting support.

---

## How to use this file
- Read the section matching the sidebar item you need (e.g., `Products`, `Orders`).
- Follow step-by-step actions under "Common tasks" for each section.
- Check the "Developer files" link if a change requires a developer.
- If stuck: take a screenshot or short screen recording and share it with support (see Self-help section).

---

## Sidebar Reference — All sections

Below each heading: What it controls → Common tasks (step-by-step) → Where to find developer view files → Quick troubleshooting.

### Dashboard
- What: Real-time KPIs and alerts (orders, revenue, low stock, top products).
- Common tasks:
  1. Open Admin → Dashboard.
  2. Scan Today's Orders and Revenue widgets.
  3. Click a widget (e.g., Recent Orders) to open the Orders list filtered.
- Developer files: `resources/views/admin/dashboard/index.blade.php`
- Troubleshooting: If metrics look wrong, check background jobs and reporting cron tasks.

### Products
- What: Create, edit, organize product catalog, variants, images, SEO.
- Common tasks:
  Add Product:
    1. Admin → Products → Add Product.
    2. Fill `Name`, `SKU`, `Price`, `Categories` (at least one), and `Status`.
    3. Inventory: set `Stock Quantity`, toggle `Allow Backorders` as needed.
    4. Upload `Main Image` and gallery; fill `Short` and `Full Description`.
    5. Attributes: add (e.g., Size) and values (S, M, L) to create variants.
    6. Specifications: add key/value pairs for product specs.
    7. Shipping: weight and dimensions if shipping rules use them.
    8. SEO: slug, meta title, meta description, tags.
    9. Click `Save` or `Publish`.
  Edit Product:
    1. Admin → Products → Search by name or SKU.
    2. Click `Edit` on the product row.
    3. Modify fields (price, stock, images, attributes) and save.
  Create / edit Variants:
    1. On product edit page add attributes and click `Generate Variants` (or similar control).
    2. Edit each variant's SKU, price override, image, and stock.
- Developer files: `resources/views/admin/products/create.blade.php`, `resources/views/admin/products/edit.blade.php`, `resources/views/admin/products/index.blade.php`
- Troubleshooting: Missing image? run `php artisan storage:link` and verify file storage; validation errors: check required fields.

### Orders
- What: View and process customer orders, refunds, shipping updates.
- Common tasks:
  1. Admin → Orders.
  2. Use filters (status, payment) or search by order ID/customer.
  3. Click an order to view details: items, payment, shipping address.
  4. Change status (e.g., Pending → Confirmed → Processing → Shipped) and send notification.
  5. For refunds: click `Refund`, enter amount and reason, confirm.
  6. Use export buttons (CSV/Excel) for bulk reporting.
- Developer files: `resources/views/admin/orders/index.blade.php`
- Troubleshooting: Payment shows pending — confirm with payment gateway logs; stock not reduced — verify order processing listeners.

### Categories
- What: Organize products into hierarchies for navigation and filters.
- Common tasks:
  1. Admin → Categories → Add Category.
  2. Provide `Name`, `Parent` (optional), `Description`, `Image`, and SEO fields.
  3. Save and then assign products to the new category from product edit.
- Developer files: `resources/views/admin/categories/index.blade.php`

### Inventory
- What: Track stock across products and variants, perform adjustments and transfers.
- Common tasks:
  1. Admin → Inventory.
  2. Search for product/variant, open stock details.
  3. To increase stock: click `Adjustment` / `Add Stock`, enter quantity, reason, save.
  4. To transfer between warehouses: open `Transfers`, create new transfer, select source/destination, add items, confirm.
- Developer files: `resources/views/admin/inventory/index.blade.php`
- Troubleshooting: If transfers fail, check user permissions and inventory service logs.

### Users (Staff) & Customers
- What: Manage admin/staff accounts and customer records.
- Common tasks (Staff):
  1. Admin → Users → Add User.
  2. Provide name, email, role/permissions, and password.
  3. Save; staff will receive login instructions.
- Common tasks (Customers):
  1. Admin → Customers (or Users → Customers) → search customer.
  2. Edit profile, addresses, segment assignment, or view order history.
- Developer files: `resources/views/admin/users/index.blade.php`

### Offers & Promotions
- What: Create coupons, discounts, and special pricing rules.
- Common tasks:
  1. Admin → Offers → Create Offer.
  2. Enter name, code (if coupon), discount type (percentage/fixed), validity, usage limits.
  3. Restrict to products/categories or apply store-wide.
  4. Save and test on storefront with a sample cart.
- Developer files: `resources/views/admin/offers/index.blade.php`

### Reports
- What: Pre-built sales, customer, and product reports for analysis.
- Common tasks:
  1. Admin → Reports → select report (Sales, Customers, Products).
  2. Choose date range and filters, generate, and export if needed.
- Developer files: `resources/views/admin/reports/index.blade.php`

### Settings
- What: Global configuration (store info, currency, tax, payment gateways, email, shipping defaults).
- Common tasks:
  1. Admin → Settings.
  2. Edit Store Info (name, contact), Currency, and Tax settings.
  3. Update Payment Gateway credentials under Payment section.
  4. Save changes and test payment flow on staging before production.
- Developer files: `resources/views/admin/settings/index.blade.php`

### Media Library
- What: Central place to upload and reuse images and files.
- Common tasks:
  1. Admin → Media → Upload.
  2. Create folders/tags for organization.
  3. Use media chooser inside product forms to add images.
- Developer files: `resources/views/admin/media/index.blade.php`

### Pages
- What: Manage CMS pages (About, Contact, Terms, Privacy).
- Common tasks:
  1. Admin → Pages → Create Page.
  2. Add Title, slug, content (rich text), SEO meta.
  3. Save and then view on storefront to confirm.
- Developer files: `resources/views/admin/pages/index.blade.php`

### CRM, Banners & Home Sections
- What: Manage homepage content, banners, promotions and popups.
- Common tasks:
  1. Admin → CRM → Banners / Home Sections / Popups.
  2. Create new banner/home-section: set title, images, links, schedule.
  3. Preview on staging before publishing.
- Developer files: `resources/views/admin/crm/` and its subfolders

### Notifications & Email Templates
- What: Templates used for order confirmations, password resets, and marketing.
- Common tasks:
  1. Admin → Notifications → Edit Template.
  2. Use sample data to send a test email.
  3. Save template and monitor delivery logs if available.
- Developer files: `resources/views/admin/notifications/`

### Shipping
- What: Configure shipping methods, zones, and rates.
- Common tasks:
  1. Admin → Shipping → Add Shipping Method.
  2. Define zones (countries/regions), rates (flat/weight-based), and free-shipping rules.
  3. Save and place a sample order to validate rates.
- Developer files: `resources/views/admin/shipping/index.blade.php`

### Taxes
- What: Define tax classes and region-based tax rates.
- Common tasks:
  1. Admin → Taxes → Add Tax Rate.
  2. Assign rate to tax class, save and test checkout.
- Developer files: `resources/views/admin/taxes/index.blade.php`

### Reviews & Testimonials
- What: Moderate customer product reviews and select testimonials for display.
- Common tasks:
  1. Admin → Reviews → Approve / Reject / Reply.
  2. Admin → Testimonials → Add testimonial for homepage.
- Developer files: `resources/views/admin/reviews/index.blade.php`, `resources/views/admin/testimonials/index.blade.php`

### Brands
- What: Manage product brands for filtering and brand pages.
- Common tasks:
  1. Admin → Brands → Add Brand (name, logo, description).
  2. Link brand on product edit page.
- Developer files: `resources/views/admin/brands/index.blade.php`

### Videos
- What: Upload/embed product or promotional videos.
- Common tasks:
  1. Admin → Videos → Add Video (upload or embed URL).
  2. Attach to product pages or banners.
- Developer files: `resources/views/admin/videos/index.blade.php`

### Auth & Admin Account Management
- What: Login, register (if allowed), and password resets for admins.
- Common tasks:
  1. Admin → Auth → Forgot Password to reset; follow email link to set new password.
  2. For locked accounts, an existing admin with user management rights must reset password or change role.
- Developer files: `resources/views/admin/auth/` (login, register, forgot-password)

---

## Common Workflows (step-by-step collections)

 - Create and publish a product with variants (short):
    1. Products → Add Product → fill basic fields.
    2. Add Attributes (Size, Color) and generate variants.
    3. Edit per-variant SKU, price, image, and stock.
    4. Upload images, set category, set SEO, Save → Publish.

 - Process an order:
    1. Orders → open order → confirm payment status.
    2. Update status to Processing, pick/pack, then Shipped.
    3. Add tracking number and notify customer.

 - Create a timed promotion:
    1. Offers → Create Offer → set discount, date range, usage limits.
    2. Restrict to products or categories, save.
    3. Test by creating a cart with an eligible product.

---

## Self-help & Troubleshooting (follow before contacting support)

1. Reproduce the problem and take a screenshot showing browser console errors (F12). If possible record a 30–60s screencast.
2. Check these quick items:
   - Are required fields filled? (Name, Price, Category for products)
   - Are images uploaded to media library and visible?
   - Did you receive a validation error message? Copy full text.
   - Can you reproduce the issue in a different browser or incognito window?
3. Useful checks for the team:
   - Run `php artisan storage:link` if images not visible.
   - Verify cron/jobs for background tasks if reports/metrics are delayed.
4. When contacting support include:
   - Your admin user email, the page URL, steps to reproduce, screenshots/screencast, and the time (with timezone).

---

## Developer reference (quick links)
- Product views: `resources/views/admin/products/create.blade.php`, `resources/views/admin/products/edit.blade.php`, `resources/views/admin/products/index.blade.php`
- Orders view: `resources/views/admin/orders/index.blade.php`
- Dashboard: `resources/views/admin/dashboard/index.blade.php`
- Settings: `resources/views/admin/settings/index.blade.php`

---

## Admin-day checklist (recommended)
- Morning: check Dashboard, process overnight orders, respond to urgent messages.
- Midday: verify inventory, update promotions, approve reviews.
- End of day: export reports, reconcile payments, confirm shipments.

---

If you want, I can now:
- Create a printable PDF of this file (`adminpanel.md`) for staff handouts.
- Produce annotated screenshots for the most common tasks (Add/Edit Product, Process Order).
- Record a short screencast showing Add Product + create variants.

Tell me which asset you'd like next and I'll prepare it.