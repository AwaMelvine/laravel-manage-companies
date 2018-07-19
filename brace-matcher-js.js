function Braces(arrStr) {
  const ALL_BRACES = ")]}{[(";
  const OPEN = "{[(";
  const CLOSE = ")]}";

  let refMap = {
    '}': '{',
    '{': '}',
    '[': ']',
    ']': '[',
    '(': ')',
    ')': '('
  };


  for (let stringValue of arrStr) {
    var map = {
      '}': 0,
      '{': 0,
      '[': 0,
      ']': 0,
      '(': 0,
      ')': 0
    };

    let opened = [];

    for (var i = 0; i < stringValue.length; i++) {
        let char = stringValue.charAt(i);

        if(ALL_BRACES.indexOf(char) > -1){
          let otherPair = refMap[char];

          // if open, set to 0, if close, set to 1
          if(OPEN.indexOf(char) > -1) {
            opened.push(char);
            map[char] -= 1; // subtracting 1 means opening
          } else if(CLOSE.indexOf(char) > -1) {
            let recentlyOpened = opened.slice(opened.length - 1)[0];

            console.log([recentlyOpened, otherPair]);

            if(recentlyOpened !== otherPair) {
              console.log("Failed at", i);
              map[otherPair] += 1;
            } else if(map[otherPair] >= map[char]) {
              console.log("Failed at", i);
              map[otherPair] += 1; // adding one means closing
            } else {
              map[otherPair] += 1;
            }
          }
        }
    }
    console.log(map);
  }

}

Braces(["t()(){})", "t()(){}"]);
