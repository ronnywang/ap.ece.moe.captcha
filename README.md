# ap.ece.moe.captcha

利用工人智慧破解 https://ap.ece.moe.edu.tw/webecems/pubSearch.aspx 的 captcha

順序:
1. mkdir input/ 建立 input/ 資料夾
2. php get-sample.php # 取得 500 個 sample 檔
3. php merge.php > merge.json # 從 500 個 sample 中找出相同的數字圖片
4. php -S 0:7788 # 透過 http://localhost:7788/user-input.php 開啟，將 40 個數字輸入，輸入後複製下面產生的 JSON ，存成 ans.json
5. php crack.php {some.png} # 得到答案

比對方法：
- captcha 圖片尺寸為 70 x 24 ，四個數字，四種字型，只有顏色隨機和雜訊，沒有任何扭曲
- 先將 70 x 24 切成 16 x 24 四個數字圖，然後將圖片灰階化，轉成只有 0 和 1
- 將 0 和 1 與 ans.json 裡面比對，只要差異大於 40 點就跳過(40 / (16 * 24) = 10.4%)

License:
程式碼以 BSD License 授權
