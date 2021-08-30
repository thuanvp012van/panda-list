# Hướng dẫn sử dụng panda-list
1. Khởi tạo Object
    ### Tạo Object pandaList với câu lệnh
    ```php
        $list = new PandaList([
            'price' => 100,
            'price' => 300,
            'price' => 200,
            'price' => 500,
        ]);
    ```
    ### Hoặc sử dụng câu lệnh
    ```php
        $list = pandaList([
            'price' => 100,
            'price' => 300,
            'price' => 200,
            'price' => 500,
        ]);
    ```
2. Lấy dữ liệu dưới dạng object
    ```php
        $list->getItems();
    ```
3. Lấy dữ lệu dưới dạng array
    ```php
        $list->toArray();
    ```
4. Thêm dữ liệu vảo object
    ```php
        $list = pandaList(['price' => 100, 'price' => 20]);
        $list->addItems(['price' => 30, 'price' => 40]);
        $list->getItems(); 
        //['price' => 100, 'price' => 20, 'price' => 30, 'price' => 40]
    ```
5. Lấy kí tự đầu tiên của mảng
    ```php
        $list = pandaList(['price' => 100, 'price' => 20]);
        $list->first(); // 100
    ```
6. Lấy kí tự đầu tiên của mảng theo điều kiện
    ```php
        $list = pandaList([
            ['price' => 100],
            ['price' => 20]
        ]);
        $list->first(function($item) {
            return $item['price'] < 100;
        }); // ['price' => 20]
    ```
7. Lấy giá trị qua key được gọi
    ```php
        $list = pandaList([
            ['price' => 100],
            ['price' => 20]
        ]);
        $list->get(1); // ['price' => 20]
    ```
8. Xóa kí tự trong mảng bằng key
    ```php
        $list = pandaList([
            ['price' => 100],
            ['price' => 20]
        ]);
        $list->remove(0); // [['price' => 20]]
    ```
9. Lấy tổng số item của mảng
    ```php
        $list = pandaList([
            ['price' => 100],
            ['price' => 20]
        ]);
        $list->count(); // 2
    ```
10. Kiểm tra mảng có rỗng không
    ```php
        $list = pandaList([
            ['price' => 100],
            ['price' => 20]
        ]);
        $list->isEmpty(); // false

        $list = pandaList([]);
        $list->isEmpty(); // true
    ```
11. Đảo ngược mảng
    ```php
        $list = pandaList([
            ['price' => 100],
            ['price' => 20]
        ]);
        $list = $list->reverse();
        $list->toArray(); // [['price' => 100], ['price' => 20]]
    ```
12. Gỡ bỏ các thành phần bị trùng lặp trong mảng
    ```php
        $list = pandaList([
            ['price' => 100],
            ['price' => 100]
        ]);
        $list = $list->unique();
        $list->toArray(); // [['price' => 100]]
    ```
13. Map array bằng function map
    ```php
        $list = pandaList([10,20]);
        $list->map(function($item) {
            return $item + 10;
        });
        $list->toArray(); // [20, 30]
    ```
14. Lọc array bằng function filter
    ```php
        $list = pandaList([10,20]);
        $list->filter(function($item) {
            return $item > 10;
        });
        $list->toArray(); // [20]
    ```
15. Trả ra mảng dưới dạng object và thoát chức năng
    ```php
        $list = pandaList([10,20]);
        $list->dd(); // {"0": 10, "1": 20}
    ```
16. Trả mảng dưới dạng string
    ```php
        $list = pandaList([10,20]);
        $list->__toString(); //  array(0 => 10, 1 => 20)
    ```