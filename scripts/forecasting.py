# Import necessary libraries
import pandas as pd
import numpy as np
from statsmodels.tsa.holtwinters import ExponentialSmoothing

# Load your dataset
data = pd.read_csv('obat_keluar_12.csv')

# Prepare the data (assuming the dataset structure is similar to the one you provided)
data['Date'] = pd.date_range(start='2021-10', periods=len(data), freq='MS')
data.set_index('Date', inplace=True)

# Fitting the model with the new dataset (excluding the forecast part)
model_full = ExponentialSmoothing(
    data['Jumlah Keluar'],
    trend='add',
    seasonal='add',
    seasonal_periods=12,
    initialization_method='estimated'
).fit()

# Generating forecasts
forecast_length = 12
forecast = model_full.forecast(forecast_length)

# Combine fitted values and forecasts for plotting
forecast_full = pd.concat([model_full.fittedvalues, forecast])

# Create a DataFrame for the results
results = pd.DataFrame({
    'Date': forecast_full.index,
    'Actual Sales': data['Jumlah Keluar'].reindex(forecast_full.index),
    'Forecast': forecast_full
})

# Display the results as a table
print(results)