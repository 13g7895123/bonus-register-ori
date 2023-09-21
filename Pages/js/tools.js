/*
* @param str str    - 要修改的字串
* @param int maxNum - 字串最大數量
* @return str str   - 修改完成的字串
*/

export const strTooLong = (str, maxNum) => {
    str = str.length > maxNum ? `${str.substring(0, maxNum)}...` : str
    return str
}
