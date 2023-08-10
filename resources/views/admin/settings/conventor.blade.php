<div id="convertor">
                <form>
                    <div class="convertor-input clearfix">
                        <h2>CONVERTOR RAPID</h2>
                

                        <div class="form-group clearfix">
                            <label>Schimbă din</label>
                            <select id="from-currency" class="form-control input-sm" onchange="calcul_convertor_rapid()">
                                <option value="1">RON</option><option value="4.8668" selected="selected">EUR</option><option value="4.0994">USD</option><option value="257.2434">XAU</option><option value="2.9838">AUD</option><option value="3.1387">CAD</option><option value="4.5503">CHF</option><option value="0.1825">CZK</option><option value="0.6534">DKK</option><option value="0.2613">EGP</option><option value="5.3896">GBP</option><option value="0.01358">HUF</option><option value="0.039711">JPY</option><option value="0.2396">MDL</option><option value="0.4467">NOK</option><option value="1.0772">PLN</option><option value="0.4735">SEK</option><option value="0.4812">TRY</option><option value="5.8366">XDR</option><option value="0.0529">RUB</option><option value="2.4883">BGN</option><option value="0.2606">ZAR</option><option value="0.7419">BRL</option><option value="0.62">CNY</option><option value="0.0553">INR</option><option value="0.003659">KRW</option><option value="0.1976">MXN</option><option value="2.7854">NZD</option><option value="0.0414">RSD</option><option value="0.146">UAH</option><option value="1.116">AED</option><option value="0.6441">HRK</option><option value="0.1342">THB</option>                            </select>
                        </div>
                        <div class="form-group clearfix">
                            <label>În</label>
                            <select id="to-currency" class="form-control input-sm" onchange="calcul_convertor_rapid()">
                                <option value="1" selected="selected">RON</option><option value="4.8668">EUR</option><option value="4.0994">USD</option><option value="257.2434">XAU</option><option value="2.9838">AUD</option><option value="3.1387">CAD</option><option value="4.5503">CHF</option><option value="0.1825">CZK</option><option value="0.6534">DKK</option><option value="0.2613">EGP</option><option value="5.3896">GBP</option><option value="0.01358">HUF</option><option value="0.039711">JPY</option><option value="0.2396">MDL</option><option value="0.4467">NOK</option><option value="1.0772">PLN</option><option value="0.4735">SEK</option><option value="0.4812">TRY</option><option value="5.8366">XDR</option><option value="0.0529">RUB</option><option value="2.4883">BGN</option><option value="0.2606">ZAR</option><option value="0.7419">BRL</option><option value="0.62">CNY</option><option value="0.0553">INR</option><option value="0.003659">KRW</option><option value="0.1976">MXN</option><option value="2.7854">NZD</option><option value="0.0414">RSD</option><option value="0.146">UAH</option><option value="1.116">AED</option><option value="0.6441">HRK</option><option value="0.1342">THB</option>                            </select>
                        </div>

                        <div class="form-group clearfix">
                            <label>Suma</label>
                            <input id="initial-value" class="form-control input-sm text-right" value="1" onkeyup="calcul_convertor_rapid()" onclick="this.select();">
                            <span id="from_currency_display">EUR</span>
                            <a id="switch-currency" onclick="interschimbare(); return false;" class="btn btn-sm btn-warning" title="Inversează valutele"><span class="fa fa-refresh"></span></a>
                        </div>

                        <div class="form-group clearfix">
                            <label>Rezultat</label>
                            <input type="text" class="form-control input-sm text-right" id="rez" readonly="readonly" onclick="this.select();">
                            <!--<span id="to_currency_display">RON</span>-->
                            <a id="copy-to-clipboard" class="copy-text btn btn-sm btn-gray" title="Copiază rezultatul în clipboard"><span class="fa fa-clone"></span></a>
                        </div>       

                        <div id="copy_result">
                        </div>
                                         

                    </div>




                    <div class="convertor-results clearfix">

                        <p>Calculator TVA</p>


                        <div class="form-group clearfix">
                            <label>TVA (19%)</label>
                            <input type="text" class="form-control input-sm text-right" id="tva" readonly="readonly" onclick="this.select();">
                            <!--<span id="to_currency_display2">RON</span>-->
                            <a id="copy-to-clipboard2" class="copy-text btn btn-sm btn-gray" title="Copiază TVA-ul în clipboard"><span class="fa fa-clone"></span></a>
                        </div>

                        <div class="form-group clearfix">
                            <label>Rezultat+TVA</label>
                            <input type="text" class="form-control input-sm text-right" id="rez_final" readonly="readonly" onclick="this.select();">
                            <!--<span id="to_currency_display3">RON</span>-->
                            <a id="copy-to-clipboard3" class="copy-text btn btn-sm btn-gray" title="Copiază rezultatul + TVA-ul în clipboard"><span class="fa fa-clone"></span></a>
                        </div>
                                                    <div class="form-group clearfix">
                                <input type="checkbox" id="separator" onclick="calcul_convertor_rapid();" checked="checked"> Afișează separator mii în rezultate ( , )
                            </div>
                            <div class="form-group clearfix">
                                <input type="checkbox" id="patruzecimale" onclick="calcul_convertor_rapid();"> Afișează patru zecimale
                                în rezultat
                            </div>
                                            </div>

                </form>
            </div>

              <script type="text/javascript">
        function numberWithCommas(x) {
            var parts = x.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }
        function calcul_convertor_rapid() {
            if (document.getElementById("initial-value").value != "") {
                var str = document.getElementById("initial-value").value;
                var res = str.replace(",", ".");
                rez_exact = parseFloat(res) * parseFloat(document.getElementById("from-currency").value) / parseFloat(document.getElementById("to-currency").value);

                var zecimale = 2;

                var patruzec = document.getElementById("patruzecimale");
                if (patruzec.checked)
                    zecimale = 4;

                var sep = document.getElementById("separator");
                if (sep.checked) {
                    document.getElementById("rez").value = numberWithCommas((Math.round(rez_exact * 10000) / 10000).toFixed(zecimale));
                    document.getElementById("tva").value = numberWithCommas((Math.round(rez_exact * 10000 * 0.19) / 10000).toFixed(zecimale));
                    document.getElementById("rez_final").value = numberWithCommas((Math.round(rez_exact * 10000 * 1.19) / 10000).toFixed(zecimale));
                } else {
                    document.getElementById("rez").value = (Math.round(rez_exact * 10000) / 10000).toFixed(zecimale);
                    document.getElementById("tva").value = (Math.round(rez_exact * 10000 * 0.19) / 10000).toFixed(zecimale);
                    document.getElementById("rez_final").value = (Math.round(rez_exact * 10000 * 1.19) / 10000).toFixed(zecimale);
                }
            }
            else {
                document.getElementById("rez").value = "";
                document.getElementById("tva").value = "";
                document.getElementById("rez_final").value = "";
            }

            f = document.getElementById('from-currency');
            document.getElementById("from_currency_display").innerHTML = f.options[f.selectedIndex].text;

            /*
             e = document.getElementById('to-currency');
             document.getElementById("to_currency_display").innerHTML = e.options[e.selectedIndex].text;
             document.getElementById("to_currency_display2").innerHTML = e.options[e.selectedIndex].text;
             document.getElementById("to_currency_display3").innerHTML = e.options[e.selectedIndex].text;
             */

            /*
             var str = document.getElementById("factura").style.display;
             var n = str.indexOf("none");
             if ( n == 0) {
             document.getElementById("factura").style.display = 'block';
             document.getElementById("factura").src = document.getElementById("factura").src;
             }
             */

        }

        function interschimbare() {
            var choices1 = document.getElementById('from-currency');
            var choices2 = document.getElementById('to-currency');
            var temp1 = choices1.selectedIndex;
            var temp2 = choices2.selectedIndex;

            choices1.options[temp2].selected = true;
            choices2.options[temp1].selected = true;
            calcul_convertor_rapid();
        }

    </script>