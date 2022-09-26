import './container.css';
import CardComponent from '../CardComponent/card';


function Container() {
  return (
    <div className="flex flex-wrap justify-center p-10 gap-5">
    <div className="grid grid-cols-4 gap-4 content-center">
        <CardComponent titel="hallo" />
        <CardComponent titel="doei" />
        <CardComponent titel="meneer" />
        <CardComponent titel="drostor" />
        <CardComponent titel="Daan" />
        <CardComponent titel="Daan" />
        </div>
    </div>
  );
}

export default Container;
