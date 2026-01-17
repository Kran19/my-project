## Tax Bifurcation - How It Works

### For Guest Users (Cookie-based cart):
1. When adding product → Fetches tax rates from database
2. Stores `tax_rates` array in each cart item in cookie
3. On cart page → Calculates `tax_breakdown` from stored rates
4. Displays: "CGST: 3%", "SGST: 9%", etc.

### For Logged-In Users (Database cart):
1. When viewing cart → Eager loads tax classes and rates
2. Cart model has `tax_breakdown` accessor
3. Accessor calculates breakdown from current product tax classes
4. Displays: "CGST: 3%", "SGST: 9%", etc.

### Testing:
1. **Clear browser cache/cookies**
2. **As Guest**: Add product → View cart → Should see tax breakdown
3. **As Logged-In**: Add product → View cart → Should see tax breakdown

### Current Tax Rates in Database:
- CGST: 3%
- US Standard: 8.25% (x2)

### To Set Up Proper Indian GST (18%):
Update tax_rates table:
```sql
UPDATE tax_rates SET rate = 9.00 WHERE name = 'cgst';
INSERT INTO tax_rates (tax_class_id, name, rate, is_active, created_at, updated_at) 
VALUES (1, 'SGST', 9.00, 1, NOW(), NOW());
```
