/**
 * Created by sds25 on 6/16/17.
 */

console.log('wooooooot');

function sparkline(elemId, data) {
    let width = 200;
    let height = 40;
    let x = d3.scaleLinear().range([0, width]);
    let y = d3.scaleLinear().range([height, 0]);
    let parseDate = d3.timeParse("%m/%d/%Y");
    let line = d3.line()
        .x(function(d) { return x(d.date); })
        .y(function(d) { return y(d.close); });
    data.forEach(function(d) {
        d.date = parseDate(d.date);
        d.close = +d.count;
    });
    x.domain(d3.extent(data, function(d) { return d.date; }));
    y.domain(d3.extent(data, function(d) { return d.close; }));

    d3.select(elemId)
        .append('svg')
        .attr('width', width)
        .attr('height', height)
        .append('path')
        .datum(data)
        .attr('class', 'sparkline')
        .attr('d', line);
}

jQuery('document').ready(function(){
    console.log('woot');
    d3.tsv('http://localhost:3000/wprdc/wp-content/themes/foundation/assets/data/test.tsv', function(error, data) {
        sparkline('#sparkline1', data);
    });
    d3.tsv('http://localhost:3000/wprdc/wp-content/themes/foundation/assets/data/test2.tsv', function(error, data) {
        sparkline('#sparkline2', data);
    });
    d3.tsv('http://localhost:3000/wprdc/wp-content/themes/foundation/assets/data/test3.tsv', function(error, data) {
        sparkline('#sparkline3', data);
    });
    d3.tsv('http://localhost:3000/wprdc/wp-content/themes/foundation/assets/data/test4.tsv', function(error, data) {
        sparkline('#sparkline4', data);
    });
})