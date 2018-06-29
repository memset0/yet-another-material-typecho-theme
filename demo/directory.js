/* 使用前需要引入mdui框架 */
var $$ = mdui.JQ;
var postDirectoryBuild = function() {
    var postChildren = function children(childNodes, reg) {
        var result = [],
            isReg = typeof reg === 'object',
            isStr = typeof reg === 'string',
            node, i, len;
        for (i = 0, len = childNodes.length; i < len; i++) {
            node = childNodes[i];
            if ((node.nodeType === 1 || node.nodeType === 9) &&
                (!reg ||
                isReg && reg.test(node.tagName.toLowerCase()) ||
                isStr && node.tagName.toLowerCase() === reg)) {
                result.push(node);
            }
        }
        return result;
    },
    createPostDirectory = function(article) {
        var contentArr = [],
            titleId = [],
            levelArr, root, level,
            currentList, list, li, link, i, len;
        levelArr = (function(article, contentArr, titleId) {
            var titleElem = postChildren(article.childNodes, /^h\d$/),
                levelArr = [],
                lastNum = 1,
                lastRevNum = 1,
                count = 0,
                guid = 1,
                id = 'directory' + (Math.random() + '').replace(/\D/, ''),
                lastRevNum, num, elem;
            while (titleElem.length) {
                elem = titleElem.shift();
                contentArr.push(elem.innerHTML);
                num = +elem.tagName.match(/\d/)[0];
                if (num > lastNum) {
                    levelArr.push(1);
                    lastRevNum += 1;
                } else if (num === lastRevNum ||
                    num > lastRevNum && num <= lastNum) {
                    levelArr.push(0);
                    lastRevNum = lastRevNum;
                } else if (num < lastRevNum) {
                    levelArr.push(num - lastRevNum);
                    lastRevNum = num;
                }
                count += levelArr[levelArr.length - 1];
                lastNum = num;
                elem.id = elem.id || (id + guid++);
                titleId.push(elem.id);
            }
            if (count !== 0 && levelArr[0] === 1) levelArr[0] = 0;

            return levelArr;
        })(article, contentArr, titleId);

        currentList = '';

        dirNum = [0];

        logs = '';
        for (i = 0; i < levelArr.length; i++)
            logs += levelArr[i] + ' ';
        console.log(logs);

        logs = '';
        for (i = 0; i < levelArr.length; i++)
            logs += contentArr[i] + ' ';
        console.log(logs);

        /*
        currentList = document.createElement('div');
        currentList.className = 'mdui-collapse';
        currentList.style = 'padding: 20px'; 
        */
        currentList = '<div class="mdui-collapse mdui-list" mdui-collapse="{accordion: true}" >';

        listed = false;
        list = document.createElement('div');
        list.className = 'mdui-collapse-item';
        for (i = 0, len = levelArr.length; i < len; i++) {
            level = levelArr[i];
            if (level === 1) {
                dirNum.push(0);
            } else if (level < 0) {
                level *= 2;
                while (level++) {
                    if (level % 2) dirNum.pop();
                }
            }
            dirNum[dirNum.length - 1]++;
            if (dirNum[0] === 0) {
              return ;
            }

            console.log('level = ' + level + ' name = ' + contentArr[i] + ' num = ' + dirNum.join());
            if (dirNum.length === 1) {
              if (listed) {
                list += list_body + '</div>';
                currentList += list + '</div>';
              }
              else listed = true;

              list = '<div class="mdui-collapse-item">';
              list_header = '<div class="mdui-collapse-item-header mdui-list-item mdui-ripple"><a href="#' + titleId[i] + '" class="mdui-list-item-content">' + contentArr[i] + '</a></div>';
              list_body = '<div class="mdui-collapse-item-body mdui-list">';
              list += list_header;
            } else {
              /*mdui-collapse-item-body mdui-list */
              for (j = 1; j < dirNum.length; j++) 
                contentArr[i] = '<div class="theme-directory-spacer"></div>' + contentArr[i];
              item = '<a href="' + '#' + titleId[i] + 
                '" class="theme-directory-item mdui-list-item mdui-ripple">' + contentArr[i] + '</a>';
              list_body += item;
            }
        }
        list += list_body + '</div>';
        currentList += list + '</div>';
        //console.log(currentList)
        $$('#directory').append(currentList);
        //directory.appendChild(currentList);
    };
    createPostDirectory(document.getElementById('content'));
};
postDirectoryBuild();
mdui.mutation()