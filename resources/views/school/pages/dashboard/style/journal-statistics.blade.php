<style>
.statistik-container {
    display: flex;
    align-items: center;
    position: relative;
}

.line {
    flex-grow: 1;
    height: 2px;
    background-color: transparent;
    margin-top: 7px;
    margin-left: 10px;
    position: relative;
}

.line::before,
.line::after,
.line .small-line,
.line .smaller-line {
    content: '';
    position: absolute;
    top: 0;
    height: 2px;
    background-color: #CECECE;
}

.line::before {
    left: 0;
    width: 60%;
}

.line::after {
    right: 25%;
    width: 15%;
}

.line .small-line {
    right: 15%;
    width: 10%;
}

.line .smaller-line {
    right: 0;
    width: 5%;
}
</style>

<style>

.card-body-with-line::before {
    content: '';
    position: absolute;
    left: 10px;
    height: 85px;
    top: 20px;
    bottom: 0;
    width: 4px;
    background-color: #5D87FF;
    border-radius: 2px;
}

.card-body-with-line2::before {
    content: '';
    position: absolute;
    left: 10px;
    height: 85px;
    top: 20px;
    bottom: 0;
    width: 4px;
    background-color: #13DEB9;
    border-radius: 2px;
}

.card-body-with-line3::before {
    content: '';
    position: absolute;
    left: 10px;
    height: 85px;
    top: 20px;
    bottom: 0;
    width: 4px;
    background-color: #FA896B;
    border-radius: 2px;
}
</style>
