import { useState, useEffect } from "preact/hooks";
import { intervalToDuration } from "date-fns";

export default function SaleTimer(props) {
  const [now, setNow] = useState(Date.now());

  const [startDate] = useState(new Date(props.startDate));
  const [endDate] = useState(new Date(props.endDate));
  const [startOrEnd, setStartOrEnd] = useState("");

  const [duration, setDuration] = useState({
    years: 0,
    months: 0,
    days: 0,
    hours: 0,
    minutes: 0,
    seconds: 0,
  });

  let interval = setInterval(() => {
    setNow(Date.now());
  }, 1000);

  useEffect(() => {
    let date1 = now;
    let date2 = false;

    if (now > startDate) {
      date2 = endDate;
      setStartOrEnd(props.dataSet.endText);
    } else {
      date2 = startDate;
      setStartOrEnd(props.dataSet.startText);
    }

    if (endDate < now) {
      date2 = false;
      setStartOrEnd(props.dataSet.endedText);
    }

    if (!date2) {
      return;
    }

    setDuration(
      intervalToDuration({
        start: date1,
        end: date2,
      })
    );

    return () => {
      clearInterval(interval);
    };
  }, [now]);

  return (
    <>
      <div class="selleradise_widgets_sale-countdown__timer-duration-outer">
        {endDate > now &&
          Object.keys(duration).map((label, index) => {
            if ((label === "years" || label === "months") && !duration[label]) {
              return;
            }
            return (
              <div
                class="selleradise_widgets_sale-countdown__timer-duration"
                key={label}
              >
                <span class="selleradise_widgets_sale-countdown__timer-time">
                  {duration[label].toLocaleString("en-US", {
                    minimumIntegerDigits: 2,
                    useGrouping: false,
                  })}
                </span>
                <span class="selleradise_widgets_sale-countdown__timer-label">
                  {label}
                </span>
              </div>
            );
          })}
      </div>

      <p class="selleradise_widgets_sale-countdown__timer-title">
        {startOrEnd}
      </p>
    </>
  );
}
