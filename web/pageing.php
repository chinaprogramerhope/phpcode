<?php
/**
 * 模拟百度贴吧分页算法
 * pageSize 每一页显示的记录数
 * pageNow 当前页, 初始默认值为1
 * pageCount 总页数, 有pageSize和数据库总记录数决定
 * pageCount = ceil(数据数 / pageSize)
 *
 * pageNum 每一页显示的页码数, 自定义
 * pageStart 每一页的页码起始数, 由pageNow和pageNum动态计算
 * pageEnd 每一页的页码结尾数, 由pageNow和pageNum动态计算
 */
if ($pageNow <= intval(conConstant::pageNum / 2) + 1) {
    $pageStart = 1;
    $pageEnd = conConstant::pageNum;
} else {
    $pageStart = $pageNow - intval(conConstant::pageNum / 2);
    $pageEnd = $pageNow + ceil(conConstant::pageNum / 2) - 1;
}

// 对pageEnd进行校验, 并重新赋值
if ($pageEnd > $pageCount) {
    $pageEnd = $pageCount;
}
if ($pageEnd <= conConstant::pageNum) { // 当不足pageNum数目时, 要全部显示, 所以pageStart要始终置为1
    $pageStart = 1;
}
