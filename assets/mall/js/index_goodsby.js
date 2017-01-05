/**
 * Created by 二更 on 2016/11/3.
 */

var Speed = 10; //启动速度(毫秒)
var Space = 1; //每次移动(px)
var PageWidth = 100; //翻页宽度
var fill = 0; //整体移位
var MoveLock = false;
var MoveTimeObj;
var Comp = 0;
var AutoPlayObj = null;
GetObj("List2").innerHTML = GetObj("List1").innerHTML;
GetObj('ISL_Cont').scrollLeft = fill;
//启动自由滑动----下翻
ISL_GoDown();


//下翻动作(滚动的方向)
function GetObj(objName) {
    if (document.getElementById) {
        return eval('document.getElementById("' + objName + '")')
    } else {
        return eval('document.all.' + objName)
    }
}
//自动滚动
function AutoPlay() {
    clearInterval(AutoPlayObj);
    AutoPlayObj = setInterval('ISL_GoDown();ISL_StopDown();',4000); //间隔时间
}

//上翻开始
function ISL_GoUp() {
    if (MoveLock) return;
    clearInterval(AutoPlayObj);
    MoveLock = true;
    MoveTimeObj = setInterval('ISL_ScrUp();', Speed);
}

//上翻停止
function ISL_StopUp() {
    clearInterval(MoveTimeObj);
    if (GetObj('ISL_Cont').scrollLeft % PageWidth - fill != 0) {
        Comp = fill - (GetObj('ISL_Cont').scrollLeft % PageWidth);
        CompScr();
    } else {
        MoveLock = false;
    }
}
//上翻动作
function ISL_ScrUp() {
    if (GetObj('ISL_Cont').scrollLeft <= 0) {
        GetObj('ISL_Cont').scrollLeft = GetObj('ISL_Cont').scrollLeft + GetObj('List1').offsetWidth
    }
    GetObj('ISL_Cont').scrollLeft -= Space;
}

//下翻
function ISL_GoDown() {
    MoveTimeObj = setInterval('ISL_ScrDown()', Speed);
}

//下翻停止
function stop(){
    clearInterval(MoveTimeObj);

}
function ISL_StopDown() {
    clearInterval(MoveTimeObj);
    if (GetObj('ISL_Cont').scrollLeft % PageWidth - fill != 0) {
        Comp = PageWidth - GetObj('ISL_Cont').scrollLeft % PageWidth + fill;
        CompScr();
    } else {
        MoveLock = false;
    }
    // AutoPlay();
}

//下翻动作
function ISL_ScrDown() {
    if (GetObj('ISL_Cont').scrollLeft >= GetObj('List1').scrollWidth) {
        GetObj('ISL_Cont').scrollLeft = GetObj('ISL_Cont').scrollLeft - GetObj('List1').scrollWidth;
    }
    GetObj('ISL_Cont').scrollLeft += Space;
}

function CompScr() {
    var num;
    if (Comp == 0) {
        MoveLock = false;
        return;
    }
    if (Comp < 0) { //上翻
        if (Comp < -Space) {
            Comp += Space;
            num = Space;
        } else {
            num = -Comp;
            Comp = 0;
        }
        GetObj('ISL_Cont').scrollLeft -= num;
        setTimeout('CompScr()', Speed);
    } else { //下翻
        if (Comp > Space) {
            Comp -= Space;
            num = Space;
        } else {
            num = Comp;
            Comp = 0;
        }
        GetObj('ISL_Cont').scrollLeft += num;
        setTimeout('CompScr()', Speed);
    }
}
