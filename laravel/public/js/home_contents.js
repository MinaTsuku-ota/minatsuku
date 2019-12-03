$(function(){
    var main_contents = $('#main_contents');
    $.ajax({
        url:'data.xml',
        dataType:'xml',
        success:function(xml){
            var contents = $(xml);
            contents.find('data').each(function(){
                var data = $(this);

                var title = data.find('title').text();
                var info = data.find('info').text();
                var picture = data.find('picture').text();

                //tableのjQueryオブジェクト生成
                var table = $('<table />');
                var thead = $('<thead />');
                var tbody = $('<tbody />');

                var img = $('<img src="" />');


                var tr = $('<tr />');
                var tr_info = $('<tr />');
                var tr_img = $('<tr />');

                //ミドル
                var td_col_info = $('<td colspan="2" />').html(tr_info).text('info');
                var td_col_img = $('<td colspan="2" />').html(tr_img).html(img).text('img');
                //ボトム
                var td_row_hyoka = $('<td rowspan ="2" />').text('評価');
                var td_row_comento = $('<td rowspan ="2" />').text('コメント');
                var td_row_name = $('<td rowspan ="2" />').text('ユーザーネーム');
                var td_row_kamei = $('<td rowspan ="2" />').text('情報システム科');

                var th = $('<th colspan="4" />').text('テストだよ');

                //テーブル作成
                //テーブルトップのタイトル
                thead.append(tr).html(th);
                table.append(thead);

                //テーブルミドルの説明欄と画像
                (tr_info).html(td_col_info).appendTo(tbody);
                (td_col_img).appendTo(tr_info);

                //テーブルボトムの4ボタン
                (tr).append(td_row_hyoka).appendTo(tbody);
                (tr).append(td_row_comento).appendTo(tbody);
                (tr).append(td_row_name).appendTo(tbody);
                (tr).append(td_row_kamei).appendTo(tbody);
                table.append(tbody);

                main_contents.append(table);
            })
        }
    })
})