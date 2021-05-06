# ap.ece.moe.captcha

利用工人智慧破解 https://ap.ece.moe.edu.tw/webecems/pubSearch.aspx 的 captcha

順序:
1. mkdir input/ 建立 input/ 資料夾
2. php get-sample.php # 取得 500 個 sample 檔
3. php merge.php > merge.json # 從 500 個 sample 中找出相同的數字圖片
4. php -S 0:7788 # 透過 http://localhost:7788/user-input.php 開啟，將 30 個數字輸入，輸入後複製下面產生的 JSON ，存成 ans.json
5. php crack.php {some.png} # 得到答案

License:
程式碼以 BSD License 授權
