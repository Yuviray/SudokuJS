setScore = import('./sudokuJS.js');
test('the timer incrementer', ()=> {
    expect(setScore()).toBeGreaterThanOrEqual(0);
});