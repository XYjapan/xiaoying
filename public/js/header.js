

/**
 * @一级菜单拼接
 * @param dat
 * @returns {string}
 */
function createNav(dat)
{
    var html = "",
        data = dat[2];
    if(data != false){
        html += "<li>";
        html += "  <a href='' target='_blank' class='pull_down'>"+dat[0]+"</a>";
        html += "  <ul>";
        html +=  child_nav(dat);
        html += "  </ul>";
        html += "</li>";
    }else{
        html += "<li>";
        html += "  <a href="+dat[1]+" target='_blank'>"+dat[0]+"</a>";
        html += "</li>";
    }

    return html;
}

/**
 * @二级菜单拼接
 * @param pro
 * @returns {string}
 */
function child_nav(pro)
{
    var html ="",
        data1 = pro[2];
    if(data1 != false){
        EACH(data1,function(k,v){
            html += "<li><a href="+v[1]+">"+v[0]+"</a></li>";
        });
    }else{
        html += "<li class='hide'></li>";
    }
    return html;
}
